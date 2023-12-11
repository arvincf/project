<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use App\Models\ProductReserve;
use App\Models\User;

class MainController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalreservation = ProductReserve::count();
        $totalDelivery = Delivery::count();

        return view("userpage.dashboard", compact("totalUsers", "totalProducts", "totalreservation", "totalDelivery"));
    }

    public function settings()
    {
        return view("userpage.settings");
    }
}
