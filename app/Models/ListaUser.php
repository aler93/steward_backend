<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ListaUser
 *
 * @property int $id
 * @property string $uuid
 * @property int $id_user
 * @property string|null $data_compra
 * @property bool $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListaProduto> $produtos
 * @property-read int|null $produtos_count
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser whereDataCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListaUser whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListaProduto> $produtos
 * @mixin \Eloquent
 */
class ListaUser extends Model
{
    use HasFactory;

    public $table = "listas_user";

    protected $fillable = [
        "uuid",
        "id_user",
        "data_compra",
        "concluido",
        "created_at",
        "updated_at",
    ];

    protected $hidden = [
        "id",
        "id_user",
    ];

    public function produtos()
    {
        return $this->hasMany(ListaProduto::class, "id_lista", "id");
    }
}
