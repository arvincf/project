<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DeliveryController extends Controller
{
    
    private $delivers;

    public function __construct()
    {
        $this->delivers = new Delivery;
    }
    
    public function Deliver()
{
    $delivers = Delivery::all();
    $products = Product::all();

    return view('userpage.delivery.delivery', compact('delivers', 'products'));
}

    public function Adddelivery(Request $request)
{
    $validation = Validator::make($request->all(), [
        'prodName' => 'required',
        'deliverydate' => 'required',
        'quantity' => 'required',
    ]);

    if ($validation->fails()) {
        return back()->withInput()->with('warning', $validation->errors()->first());
    }

    $this->delivers->create([
        'id' => $this->delivers->max('id') + 1,
        'supplierName' => trim($request->supplierName),
        'prodName' => trim($request->prodName),
        'status' => trim($request->status),
        'deliverydate' => trim($request->deliverydate),
        'quantity' => trim($request->quantity),
        'dateofstoring' => now()
    ]);

    return back()->with('success', "Deliver product is successfully added!");
}

    public function updateDelivery()
{

}

}
