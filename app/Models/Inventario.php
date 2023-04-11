<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inventario
 *
 * @property int $id
 * @property int $id_user
 * @property int|null $id_produto
 * @property string|null $produto
 * @property float $quantidade
 * @property string $medida_quantidade
 * @property string|null $validade
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $observacoes
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereIdProduto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereMedidaQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereObservacoes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereProduto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inventario whereValidade($value)
 * @mixin \Eloquent
 */
class Inventario extends Model
{
    use HasFactory;

    protected $table = "inventario";

    protected $hidden = [
        "id_user",
        "id_produto",
    ];

    protected $casts = [
        "quantidade" => "float",
    ];
}
