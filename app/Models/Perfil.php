<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    public $table = "perfil_user";

    protected $fillable = [
        "user_id",
        "name",
        "document",
        "is_self_document",
        "phone_number",
        "height",
        "avatar_url",
        "created_at",
        "updated_at",
    ];

    protected $hidden = [
        //"id_user",
        "id",
        "created_at",
        "updated_at",
    ];
}
