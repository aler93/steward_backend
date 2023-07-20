<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvioMensagem extends Model
{
    use HasFactory;

    public $table = "envio_mensagens";
    public $fillable = ["canal", "destino", "mensagem", "falha", "created_at", "updated_at"];
}
