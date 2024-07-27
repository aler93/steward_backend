<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAbastecimento extends Model
{
    use HasFactory;

    protected $table    = "user_abastecimentos";
    protected $fillable = [
        "id_carro",
        "km",
        "litros",
        "total_pago",
        "preco_litro",
        "descricao",
        "created_at",
        "updated_at",
    ];
}
