<?php

namespace App\Http\Controllers;

class SalesController extends Controller
{
    public function sales()
    {
        return view("userpage.sales.managesales");
    }
}
