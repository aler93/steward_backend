<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
