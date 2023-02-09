<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoriaProduto
 *
 * @property int $id
 * @property string $nome
 * @property int|null $id_categoria
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProduto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProduto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProduto query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProduto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProduto whereIdCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoriaProduto whereNome($value)
 * @mixin \Eloquent
 */
class CategoriaProduto extends Model
{
    use HasFactory;

    public $table = "categorias_produtos";
    public $timestamps = false;

    protected $fillable = ["nome", "id_categoria"];
}
