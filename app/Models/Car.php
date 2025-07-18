<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ["model", "seaters", "price", "image"];

    public function books() {
        return $this->hasMany(Book::class, "vehicle_id");
    }
}
