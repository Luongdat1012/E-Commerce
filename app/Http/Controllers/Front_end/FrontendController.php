<?php

namespace App\Http\Controllers\Front_end;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function cart(){
        return view('front_end.cart.cart');
    }
}
