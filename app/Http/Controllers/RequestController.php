<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{

    private $request, $product, $user;

    public function __construct()
    {
        $this->request = new ProductRequest;
        $this->product = new Product;
        $this->user = new User;

    }
    public function displayrequestProduct()
    {
        $request =  $this->request->all();
        $products = $this->product->all();
        $user = $this->user->all();

        return view('userpage.request.request',  compact('request', 'products', 'user'));
    }

    public function addrequest(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'prodName' => 'required',
            'quantity' => 'required',
            'supplier'=> 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }


        $this->request->create([
            'id' => $this->request->max('id') + 1,
            'supplier_name' => trim($request->supplier),
            'product_name' => trim($request->prodName),
            'status' => trim($request->status),
            'date' => now(),
            'quantity' => trim($request->quantity)
        ]);

        return back()->with('success', "Product Requesting is successfully added!");
    }
}
