<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abastecimento extends Model
{
    use HasFactory;

    protected $table = "abastecimentos";

    protected $fillable = [
        "id_carro",
        "km",
        "litros",
        "custo_gasolina",
        "observacoes",
        "data",
    ];

    protected $hidden = [
        "id_carro"
    ];
}
