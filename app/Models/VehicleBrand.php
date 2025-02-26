<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    public $table      = "vehicle_brands";
    public $timestamps = false;

    protected $fillable = ["name", "origin", "year_foudation"];
}
