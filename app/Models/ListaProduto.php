<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaProduto extends Model
{
    use HasFactory;

    public $table = "lista_produtos";

    protected $fillable = [
        "id_lista",
        "id_produto",
        "produto",
        "observacoes",
        "created_at",
        "updated_at",
    ];

    protected $hiden = [
        "id_produto",
    ];
}
