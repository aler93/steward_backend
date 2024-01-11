<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoVariacao extends Model
{
    use HasFactory;

    public $table = "produto_variacao";

    protected $fillable = [
        "uuid",
        "produto_id",
        "nome",
        "peso",
        "peso_unidade",
        "sabor",
        "unidades",
        "image_link",
        "image_local",
        "created_at",
        "updated_at",
    ];
}
