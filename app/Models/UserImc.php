<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserImc
 *
 * @property int $id
 * @property int $id_user
 * @property float $massa_corporal
 * @property float $altura
 * @property string|null $observacoes
 * @property string $data_hora
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc whereAltura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc whereDataHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc whereMassaCorporal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserImc whereObservacoes($value)
 * @mixin \Eloquent
 */
class UserImc extends Model
{
    use HasFactory;

    public $table = "user_imc";
    public $timestamps = false;

    protected $fillable = [
        "id_user",
        "massa_corporal",
        "altura",
        "observacoes",
        "data_hora",
    ];

    protected $hidden = [
        "id_user"
    ];
}
