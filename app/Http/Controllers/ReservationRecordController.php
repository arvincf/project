<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReserve;
use Illuminate\Http\Request;

class ReservationRecordController extends Controller
{
    private $product, $reserveProduct;

    public function __construct()
    {
        $this->product = new Product;
        $this->reserveProduct = new ProductReserve;
    }

    public function manageReservation()
    {
        $reserveProduct = $this->reserveProduct->where('customer_id', auth()->user()->id)->get();

        return view("userpage.reservationrecord", compact('reserveProduct'));
    }

    public function viewProduct()
    {
        $products = $this->product->all();

        return view("userpage.reservation.reservation", compact('products'));
    }

    public function reserveProduct(Request $request)
    {
        $product = $this->product->find($request->productId);
        $product->update([
            'quantity' => $product->quantity - $request->quantity
        ]);
        $this->reserveProduct->create([
            'customer_id' => auth()->user()->id,
            'product_id' => $request->productId,
            'product_name' => $product->name,
            'details' => $product->details,
            'quantity' => $request->quantity,
            'date' => now(),
            'status' => "Pending"
        ]);

        return back()->with('success', "Product successfully reserved!");
    }
}
