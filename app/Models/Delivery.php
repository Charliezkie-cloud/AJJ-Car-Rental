<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ["name", "price"];

    public function books() {
        return $this->hasMany(Book::class, "delivery_id");
    }
}
