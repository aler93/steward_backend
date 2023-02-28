<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    public $table = "carros";
    protected $fillable = [
        "uuid",
        "id_user",
        "marca",
        "modelo",
        "ano",
        "id_transmissao",
        "observacoes",
    ];
    protected $hidden = [
        "id",
        "id_user",
        "id_transmissao",
    ];

    public function transmissao()
    {
        return $this->hasOne(Lookup::class, "id", "id_transmissao");
    }
}
