<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function createDelivery(Request $request) {
        $incomingFields = $request->validate([
            "delivery_name" => ["required"],
            "delivery_price" => ["required", "numeric"]
        ]);

        $incomingFields["name"] = strip_tags($incomingFields["delivery_name"]);
        $incomingFields["price"] = strip_tags($incomingFields["delivery_price"]);

        Delivery::create($incomingFields);

        return redirect()->back()->with(["createDeliverySuccess" => "Your mode of delivery has been created."]);
    }

    public function editDeliveryView(Delivery $delivery) {
        return view("edit-delivery", ["delivery" => $delivery]);
    }

    public function editDelivery(Request $request, Delivery $delivery) {
        $incomingFields = $request->validate([
            "name" => ["required"],
            "price" => ["required", "numeric"]
        ]);

        
        $incomingFields["name"] = strip_tags($incomingFields["name"]);
        $incomingFields["price"] = strip_tags($incomingFields["price"]);

        $delivery->update($incomingFields);

        return redirect()->back()->with(["editDeliverySuccess" => "Your mode of delivery has been updated."]);
    }

    public function deleteDelivery(Delivery $delivery) {
        $delivery->delete();

        return redirect()->route("dashboard")->with(["deleteDeliverySuccess" => "Your mode of delivery has been deleted."]);
    }
}
