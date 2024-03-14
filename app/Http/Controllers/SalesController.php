<?php

namespace App\Http\Controllers;
use App\Models\Sales;

class SalesController extends Controller
{
    private $sales;

    public function __construct()
    {
        $this->sales = new Sales;
    }


    public function sales()
    {
        $sales = $this->sales->all();
        return view("userpage.sales.managesales", compact('sales'));
    }
}
