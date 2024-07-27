<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkPagamentoComunicacao extends Model
{
    use HasFactory;

    public    $table    = "link_pagamento_comunicacao";
    protected $fillable = ["id_link_pagamento", "id_canal_comunicacao", "dt_envio"];
}
