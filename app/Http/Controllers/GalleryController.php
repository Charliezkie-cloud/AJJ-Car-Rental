<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function uploadGallery(Request $request) {
        $incomingFields = $request->validate([
            "images" => ["required"],
            "images.*" => ["image", "mimes:jpeg,jpg,png,svg,gif,webp", "max:20000"]
        ]);

        foreach ($request->file("images") as $image) {
            $name = time() . "_" . Str::random(8) . "." . $image->getClientOriginalExtension();
            $image->storeAs("gallery", $name, "public");
            $incomingFields["name"] = $name;
            $incomingFields["user_id"] = auth()->id();
            Gallery::create($incomingFields);
        }

        return redirect()->back()->with(["galleryUploadSuccess" => "Your gallery has been uploaded."]);
    }

    public function deleteGallery(Gallery $gallery) {
        if (Storage::disk("public")->exists("gallery/" . $gallery->name)) {
            Storage::disk("public")->delete("gallery/" . $gallery->name);
        }

        $gallery->delete();

        return redirect()->back()->with(["galleryDeleteSuccess" => "Your gallery has been deleted."]);
    }
}
