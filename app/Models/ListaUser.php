<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
