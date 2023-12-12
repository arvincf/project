<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;

class DeliveryController extends Controller
{
    public function Deliver()
{
    $delivers = Delivery::all();
    $products = Product::all();

    return view('userpage.delivery.delivery', compact('delivers', 'products'));
}


}
