<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCarController extends Controller
{


    public function buy($id)
    {
        return view('payments.payment', compact('id'));

    }
}
