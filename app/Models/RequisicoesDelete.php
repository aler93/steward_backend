<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RequisicoesDelete
 *
 * @property int $id
 * @property string $tabela
 * @property string $coluna
 * @property string $coluna_valor
 * @property string|null $concluido
 * @property string|null $aprovado
 * @property bool $sucesso
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $id_user
 * @property string|null $observacao
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereAprovado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereColuna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereColunaValor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereConcluido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereObservacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereSucesso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereTabela($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequisicoesDelete whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RequisicoesDelete extends Model
{
    use HasFactory;

    protected $table    = "requisicoes_delete";
    protected $fillable = [
        "tabela",
        "coluna",
        "coluna_valor",
        "id_user",
    ];
}
