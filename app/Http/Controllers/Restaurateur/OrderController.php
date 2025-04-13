<?php

namespace App\Http\Controllers\Restaurateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('restaurant_id', auth()->user()->restaurant_id)->get();
        return view("restaurateur.orders.index", ["orders" => $orders]);
    }
}
