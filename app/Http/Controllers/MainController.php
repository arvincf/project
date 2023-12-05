<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class MainController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();

        return view("userpage.dashboard", compact("totalUsers", "totalProducts"));
    }

    public function settings()
    {
        return view("userpage.settings");
    }
}
