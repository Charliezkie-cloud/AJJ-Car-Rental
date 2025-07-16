<?php

use App\Models\Car;
use App\Models\Book;
use App\Models\Gallery;
use App\Models\Delivery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeliveryController;

Route::get('/', function () {
    $cars = Car::orderBy("price", "asc")->get();
    return view('home', ["cars" => $cars]);
});

Route::get("/book-now", function() {
    $cars = Car::orderBy("price", "asc")->get();
    $deliveries = Delivery::orderBy("price", "asc")->get();
    return view("book-now", ["cars" => $cars, "deliveries" => $deliveries]);
});
Route::post("/create-book", [BookController::class, "createBook"]);

Route::get("/gallery", function() {
    $galleries = Gallery::latest()->get();
    return view("gallery", ["galleries" => $galleries]);
});

Route::Get("/about-us", function() {
    return view("about-us");
});

Route::get("/vehicles-data", function() {
    $cars = Car::latest()->get();
    return response()->json([
        "cars" => $cars
    ]);
});
Route::get("/delivery-data", function() {
    $deliveries = Delivery::latest()->get();
    return response()->json([
        "deliveries" => $deliveries
    ]);
});

Route::get('/dashboard', function () {
    $cars = Car::latest()->get();
    $deliveries = Delivery::latest()->get();
    
    return view('dashboard', ["cars" => $cars, "deliveries" => $deliveries]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post("/create-car", [CarController::class, "createCar"]);
    Route::delete("/delete-car/{car}", [CarController::class, "deleteCar"]);

    Route::get("/edit-car/{car}", [CarController::class, "editCarView"]);
    Route::put("/edit-car/{car}", [CarController::class, "editCar"]);

    Route::post("/create-delivery", [DeliveryController::class, "createDelivery"]);
    Route::get("/edit-delivery/{delivery}", [DeliveryController::class, "editDeliveryView"]);
    Route::put("/edit-delivery/{delivery}", [DeliveryController::class, "editDelivery"]);
    Route::delete("/delete-delivery/{delivery}", [DeliveryController::class, "deleteDelivery"]);

    Route::get("/dashboard-books", function() {
        $books = Book::latest()->get();
        return view("dashboard-books", ["books" => $books]);
    })->name("dashboard.books");

    Route::get("/dashboard-gallery", function() {
        $galleries = Gallery::latest()->get();
        return view("dashboard-gallery", ["galleries" => $galleries]);
    })->name("dashboard.gallery");

    Route::post("/upload-gallery", [GalleryController::class, "uploadGallery"]);
    Route::delete("/delete-gallery/{gallery}", [GalleryController::class, "deleteGallery"]);
});

require __DIR__.'/auth.php';
