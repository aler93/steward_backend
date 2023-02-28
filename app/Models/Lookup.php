<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    use HasFactory;

    protected $table = "lookups";

    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
