<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function createCar(Request $request) {
        $incomingFields = $request->validate([
            "model" => ["required"],
            "seaters" => ["required", "regex:/^\d+(-\d+)?$/"],
            "price" => ["required", "numeric"],
            "image" => ["required", "file", "image", "mimes:jpeg,jpg,png,webp", "max:20000"]
        ]);

        $image = $request->file("image");
        $imageName = time() . "_" . Str::random(8) . "." . $image->getClientOriginalExtension();
        $image->storeAs("cars", $imageName, "public");

        $incomingFields["model"] = strip_tags($incomingFields["model"]);
        $incomingFields["seaters"] = strip_tags($incomingFields["seaters"]);
        $incomingFields["price"] = strip_tags($incomingFields["price"]);
        $incomingFields["image"] = $imageName;

        Car::create($incomingFields);

        return redirect()->route("dashboard")->with(["createCarSuccess" => "Your car has been posted."]);
    }

    public function deleteCar(Car $car) {
        $image = $car->image;

        if (Storage::disk("public")->exists("cars/" . $image)) {
            Storage::disk("public")->delete("cars/" . $image);
        }

        $car->delete();

        return redirect()->route("dashboard")->with(["deleteCarSuccess" => "Your car has been deleted."]);
    }

    public function editCarView(Car $car) {
        return view("edit-car", ["car" => $car]);
    }

    public function editCar(Request $request, Car $car) {
        $incomingFields = $request->validate([
            "model" => ["required"],
            "seaters" => ["required", "regex:/^\d+(-\d+)?$/"],
            "price" => ["required", "numeric"],
            "image" => ["sometimes", "file", "image", "mimes:jpeg,jpg,png,webp", "max:20000"]
        ]);

        if ($request->hasFile("image")) {
            $currentImage = $car->image;

            if (Storage::disk("public")->exists("cars/" . $currentImage)) {
                Storage::disk("public")->delete("cars/" . $currentImage);
            }

            $image = $request->file("image");
            $imageName = time() . "_" . Str::random(8) . "." . $image->getClientOriginalExtension();
            $image->storeAs("cars", $imageName, "public");
            
            $incomingFields["image"] = $imageName;
        }

        $incomingFields["model"] = strip_tags($incomingFields["model"]);
        $incomingFields["seaters"] = strip_tags($incomingFields["seaters"]);
        $incomingFields["price"] = strip_tags($incomingFields["price"]);

        $car->update($incomingFields);

        return redirect()->back()->with(["editCarSuccess" => "Your car has been updated."]);
    }
}
