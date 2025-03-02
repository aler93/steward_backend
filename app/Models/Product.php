<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = [
        "uuid",
        "category_id",
        "name",
        "description",
        "nutritional_information",
        "created_at",
        "updated_at",
    ];
}
