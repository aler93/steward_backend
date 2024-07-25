<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $hidden = [
        "id"
    ];

    protected $fillable = [
        "id_tipo_pagamento",
        "dt_pagamento",
        "valor_pago",
        "ativo",
        "created_at",
        "updated_at",
        "id_link_pagamento",
    ];
}
