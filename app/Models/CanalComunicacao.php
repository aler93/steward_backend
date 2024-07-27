<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanalComunicacao extends Model
{
    use HasFactory;

    public    $table      = "canais_comunicacao";
    public    $timestamps = false;
    protected $fillable   = ["nome", "ativo"];
}
