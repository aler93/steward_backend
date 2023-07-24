<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSenhaAlterado extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "user_senha_alterado";
    public $fillable = ["id_senha_recuperacao", "created_at"];
}
