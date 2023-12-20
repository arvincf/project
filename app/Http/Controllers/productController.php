<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product;
    }
    public function displayProduct()
    {
        $products = $this->product->all();

        return view('userpage.product.product', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'product_name' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'supplier_name' => 'required',
            'details' => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        $this->product->create([
            'name' => Str::title(trim($request->product_name)),
            'quantity' => trim($request->quantity),
            'unit_price' => trim($request->unit_price),
            'supplier_name' => Str::title(trim($request->supplier_name)),
            'details' => trim($request->details),
            'date_of_storing' => now()
        ]);

        return back()->with('success', "Product successfully added!");
    }

    public function editProduct(Request $request, $productId)
    {
        $validation = Validator::make($request->all(), [
            'product_name' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'supplier_name' => 'required',
            'details' => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        $this->product->find($productId)->update([
            'name' => Str::title(trim($request->product_name)),
            'quantity' => trim($request->quantity),
            'unit_price' => trim($request->unit_price),
            'supplier_name' => Str::title(trim($request->supplier_name)),
            'details' => trim($request->details)
        ]);

        return back()->with('success', "Product successfully updated!");
    }

    public function removeProduct($productId)
    {
        $this->product->destroy($productId);

        return back()->with('success', "Product successfully removed!");
    }
}
