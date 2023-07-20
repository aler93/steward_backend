<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSenhaRecuperacao extends Model
{
    use HasFactory;

    public $table = "user_senha_recuperacao";

    public $hidden = ["id"];
    public $fillable = ["uuid", "token", "email", "canal", "valido_ate", "created_at", "updated_at"];
}
