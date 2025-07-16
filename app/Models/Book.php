<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        "name",
        "email",
        "address",
        "contact_number",
        "message",
        "rental_option",
        "car_id",
        "start_date_time",
        "end_date_time",
        "delivery_id",
        "total"
    ];

    public function delivery() {
        return $this->belongsTo(Delivery::class);
    }

    public function car() {
        return $this->belongsTo(Car::class);
    }
}
