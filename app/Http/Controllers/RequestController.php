<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductRequest;
use App\Models\User;
use App\Models\Coffeebeans;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RequestController extends Controller
{

    private $delivery, $request, $user, $coffeebeans, $product;

    public function __construct()
    {
        $this->request = new ProductRequest;
        $this->user = new User;
        $this->coffeebeans = new Coffeebeans;
        $this->delivery = new Delivery;
        $this->product = new Product;

    }
    public function displayrequestProduct()
    {
        $user = auth()->user();
        if ($user->type == "supplier") {
            $request =  $this->request
            ->where('supplier_name', $user->first_name)->get();
            $coffeebeans = $this->coffeebeans->all();
            $user = $this->user->all();
        } else{
            $request =  $this->request->all();
            $coffeebeans = $this->coffeebeans->all();
            $user = $this->user->all();
        }

        return view('userpage.request.request',  compact('request', 'coffeebeans', 'user'));
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

    public function updatestatus(Request $request, $id)
    {
        $this->delivery->create([
            'supplier_name' => trim($request->supplierName),
            'quantity' => trim($request->quantity),
            'product_name' => trim($request->product_name),
            'status' => "On Deliver",
            'delivery_date' => $request->delivery_date
        ]);

        $this->request->find($id)->update([
            'status' => trim($request->status),
            'supplier_name' => trim($request->supplierName)
        ]);

        return back()->with('success', 'Request Confirmed!');
    }
    
    public function displaybeans()
    {
        $coffeebeans = $this->coffeebeans->all();
        return view('userpage.rawmat.coffeebeans', compact('coffeebeans'));
    }

    public function addcoffeebeans(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'coffee_name' => 'required',
            'supplier_name' => 'required',
            'quantity' => 'required',
            'date' => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withInput()->with('warning', $validation->errors()->first());
        }

        $this->coffeebeans->create([
            'coffee_name' => trim($request->coffee_name),
            'supplier_name' => trim($request->supplier_name),
            'quantity' => trim($request->quantity),
            'date' => $request->date
        ]);

        return back()->with('success', "Product successfully added!");
    }

    public function updatecoffeebeans(Request $request, $id)
    {
        $product = Product::findOrFail($request->product_id);
    $productQuantity = $request->prodquantity;

    // Update product quantity
    $product->update([
        'quantity' => $product->quantity + $productQuantity
    ]);

    // Update coffee bean quantity
    $coffeebean = Coffeebeans::findOrFail($product->id);
    $coffeebean->update([
        'quantity' => $coffeebean->quantity - $productQuantity
    ]);

    // Other necessary operations

    return back()->with('success', 'Product stored successfully!');
    }
}
