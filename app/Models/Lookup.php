<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lookup
 *
 * @property int $id
 * @property string $id_externo
 * @property string $valor
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup whereIdExterno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lookup whereValor($value)
 * @mixin \Eloquent
 */
class Lookup extends Model
{
    use HasFactory;

    protected $table = "lookups";

    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
