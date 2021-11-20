<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCarController extends Controller
{
    public function index()
    {
        return view('payments.payment');
    }


}
