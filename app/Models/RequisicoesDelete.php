<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisicoesDelete extends Model
{
    use HasFactory;

    protected $table    = "requisicoes_delete";
    protected $fillable = [
        "tabela",
        "coluna",
        "coluna_valor",
        "id_user",
    ];
}
