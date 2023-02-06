<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    public $table = "perfil_user";

    protected $fillable = [
        "id_user",
        "nome",
        "nome_social",
        "cpf",
        "cpf_responsavel",
        "telefone",
        "altura",
        "avatar_url",
        "sexo",
        "genero",
        "created_at",
        "updated_at",
    ];

    protected $hidden = [
        "id_user",
        "id",
        "created_at",
        "updated_at",
    ];
}
