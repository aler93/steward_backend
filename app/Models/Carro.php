<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Carro
 *
 * @property int $id
 * @property string $uuid
 * @property int $id_user
 * @property string $marca
 * @property string $modelo
 * @property int|null $ano
 * @property int|null $id_transmissao
 * @property string|null $observacoes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $principal
 * @property-read \App\Models\Lookup|null $transmissao
 * @method static \Illuminate\Database\Eloquent\Builder|Carro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carro where($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereAno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereIdTransmissao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereMarca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereModelo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereObservacoes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro wherePrincipal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carro whereUuid($value)
 * @mixin \Eloquent
 */
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
        "principal",
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
