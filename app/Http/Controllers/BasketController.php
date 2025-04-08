<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function get(){
        $userCart = Cart::all();
        return response()->json($userCart);
    }
}
