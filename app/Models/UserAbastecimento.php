<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $table    = "user_carros";
    protected $fillable = [
        "id_user",
        "carro",
        "descricao",
        "principal",
        "created_at",
        "updated_at",
    ];
}
