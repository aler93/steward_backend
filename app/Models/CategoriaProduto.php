<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;

    public $table = "categorias_produtos";
    public $timestamps = false;

    protected $fillable = ["nome", "categoria_id"];
}
