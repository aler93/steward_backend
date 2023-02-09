<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ListaProduto
 *
 * @property int $id
 * @property int $id_lista
 * @property int|null $id_produto
 * @property string $produto
 * @property string|null $observacoes
 * @property bool $status
 * @property int|null $ordem
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereIdLista($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereIdProduto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereObservacoes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereOrdem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereProduto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaProduto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        "ordem",
    ];

    protected $hidden = [
        "id_produto",
        "id_lista",
        "created_at",
        "updated_at"
    ];
}
