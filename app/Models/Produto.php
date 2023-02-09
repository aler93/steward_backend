<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Produto
 *
 * @property int $id
 * @property string $uuid
 * @property int $id_categoria
 * @property string $nome
 * @property string|null $descricao
 * @property string|null $informacao_nutricional
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereIdCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereInformacaoNutricional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereUuid($value)
 * @mixin \Eloquent
 */
class Produto extends Model
{
    use HasFactory;

    public $table = "produtos";

    protected $fillable = [
        "uuid",
        "id_categoria",
        "nome",
        "descricao",
        "informacao_nutricional",
        "created_at",
        "updated_at",
    ];
}
