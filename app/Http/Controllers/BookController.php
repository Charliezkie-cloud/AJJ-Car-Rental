<?php

namespace App\Http\Controllers;

use App\Mail\BookingNotification;
use App\Mail\BookingSubmitted;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function createBook(Request $request) {
        $incomingFields = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
            "contact_number" => ["required", "numeric"],
            "address" => ["required"],
            "message" => ["sometimes"],

            "rental_option" => ["required"],
            "vehicle" => ["required"],
            "start_date_time" => ["required", "date"],
            "end_date_time" => ["required", "date"],
            "delivery" => ["required"],

            "total" => ["required", "numeric"]
        ]);

        $incomingFields["name"] = strip_tags($incomingFields["name"]);
        $incomingFields["email"] = strip_tags($incomingFields["email"]);
        $incomingFields["address"] = strip_tags($incomingFields["address"]);
        $incomingFields["message"] = $incomingFields["message"] ? strip_tags($incomingFields["message"]) : "No message provided.";

        $incomingFields["rental_option"] = strip_tags($incomingFields["rental_option"]);
        $incomingFields["car_id"] = strip_tags($incomingFields["vehicle"]);
        $incomingFields["delivery_id"] = strip_tags($incomingFields["delivery"]);
        $incomingFields["total"] = strip_tags($incomingFields["total"]);

        $book = Book::create($incomingFields);

        Mail::to($book->email)->send(new BookingSubmitted($book));
        Mail::to(env("MAIL_USERNAME"))->send(new BookingNotification($book));

        return redirect()->back()->with(["createBookSuccess" => "Your booking form has been created."]);
    }
}
