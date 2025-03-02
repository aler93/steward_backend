<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public $table      = "product_categories";
    public $timestamps = false;

    protected $fillable = ["name", "category_id"];
}
