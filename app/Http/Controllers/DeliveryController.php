<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{

    private $deliver, $product;

    public function __construct()
    {
        $this->deliver = new Delivery;
        $this->product = new Product;
    }

    public function displayDeliver()
    {
        $delivers =  $this->deliver->all();
        $products = $this->product->all();

        return view('userpage.delivery.delivery', compact('delivers', 'products'));
    }

    public function addDelivery(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'prodName' => 'required',
            'quantity' => 'required',
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        $this->deliver->create([
            'id' => $this->deliver->max('id') + 1,
            'supplier_name' => trim($request->supplierName),
            'product_name' => trim($request->prodName),
            'status' => trim($request->status),
            'delivery_date' => now(),
            'quantity' => trim($request->quantity)
        ]);

        return back()->with('success', "Deliver product is successfully added!");
    }

    public function updateDelivery(Request $request, $id)
    {
        try {
            $delivery = $this->deliver->findOrFail($id);

            $delivery->update([
                'status' => trim($request->status),
                'delivery_date' => now()
            ]);

            return back()->with('success', 'Delivery Updated!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update delivery. ' . $e->getMessage());
        }
    }
}
