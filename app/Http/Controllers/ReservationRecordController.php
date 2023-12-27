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
        $user = auth()->user();

    // Check if the authenticated user is an admin or manager
    if ($user->type=="Admin" || $user->type=="Manager") {
        // Admins and managers can see all reservation records
        $reserveProduct = $this->reserveProduct->get();
    } else {
        // Regular customers can only see their own reservation records
        $reserveProduct = $this->reserveProduct
            ->where('customer_id', $user->id)
            ->get();
    }

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
