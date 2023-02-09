<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Perfil
 *
 * @property int $id
 * @property int $id_user
 * @property string $nome
 * @property string|null $nome_social
 * @property string|null $cpf
 * @property bool $cpf_responsavel
 * @property string|null $telefone
 * @property float|null $altura
 * @property string|null $sexo
 * @property string|null $genero
 * @property string|null $avatar_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil query()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereAltura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereCpfResponsavel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereNomeSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereSexo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereTelefone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Perfil extends Model
{
    use HasFactory;

    public $table = "perfil_user";

    protected $fillable = [
        "id_user",
        "nome",
        "nome_social",
        "cpf",
        "cpf_responsavel",
        "telefone",
        "altura",
        "avatar_url",
        "sexo",
        "genero",
        "created_at",
        "updated_at",
    ];

    protected $hidden = [
        "id_user",
        "id",
        "created_at",
        "updated_at",
    ];
}
