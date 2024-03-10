<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductRequest;
use App\Models\User;
use App\Models\Coffeebeans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{

    private $request, $user, $coffeebeans;

    public function __construct()
    {
        $this->request = new ProductRequest;
        $this->user = new User;
        $this->coffeebeans = new Coffeebeans;

    }
    public function displayrequestProduct()
    {
        $request =  $this->request->all();
        $coffeebeans = $this->coffeebeans->all();
        $user = $this->user->all();

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
        $this->request->find($id)->update([
            'status' => trim($request->status),
        ]);
        return back()->with('success', 'Request Confirmed!');
    }
    
    public function displaybeans()
    {
        $coffeebeans = $this->coffeebeans->all();
        return view('userpage.rawmat.coffeebeans', compact('coffeebeans'));
    }
}
