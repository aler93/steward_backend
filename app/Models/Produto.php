<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public $table = "produtos";

    protected $fillable = [
        "uuid",
        "categoria_id",
        "nome",
        "descricao",
        "informacao_nutricional",
        "created_at",
        "updated_at",
    ];
}
