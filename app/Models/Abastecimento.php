<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Abastecimento
 *
 * @property int $id
 * @property int $id_carro
 * @property float $km
 * @property float $litros
 * @property float|null $custo_gasolina
 * @property string|null $observacoes
 * @property string $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereCustoGasolina($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereIdCarro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereKm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereLitros($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereObservacoes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abastecimento whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
