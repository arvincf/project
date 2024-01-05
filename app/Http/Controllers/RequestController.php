<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function displayrequestProduct()
    {

        return view('userpage.request');
    }
}
