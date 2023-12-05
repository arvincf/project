<?php

namespace App\Http\Controllers;

use App\Models\Delivery;

class DeliveryController extends Controller
{
    public function Deliver()
    {
        $delivers = Delivery::all();

        return view('userpage.delivery', compact('delivers'));
    }
}
