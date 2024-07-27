<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkPagamento extends Model
{
    use HasFactory;

    public $table = "link_pagamento";

    protected $fillable = [
        "link",
        "valor",
        "id_user",
        "status",
        "dt_validade",
        "dt_pagamento",
        "created_at",
        "updated_at",
    ];

    protected $hidden = [
        "id_user"
    ];

    public static int $cancelado            = 0;
    public static int $criado               = 1;
    public static int $processandoPagamento = 2;
    public static int $pago                 = 3;
    public static int $expirado             = 4;

    public static function getStatusText(int $status): string
    {
        $text = [
            0 => "Cancelado",
            1 => "Criado",
            2 => "Processando Pagamento",
            3 => "Pago",
            4 => "Link expirado",
        ];

        return $text[$status];
    }

    public static function gerarLink(): array
    {
        $url = env("FRONT_URL");

        if (strlen($url) <= 0) {
            return [];
        }

        $id = uuid();

        return [
            "url" => $url . "/link-de-pagamento/" . $id,
            "id"  => $id,
        ];
    }

    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => env("FRONT_URL") . "/link-de-pagamento/" . $value,
        );
    }
}
