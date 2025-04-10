<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function validate(Request $request){
        $request->validate([
            'table_id' => 'required',
            'note' => 'nullable',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_time' => 'before_or_equal:end_time',
            'end_time' => 'after_or_equal:start_time',

        ]);

        $reservation = new Reservation();
        $reservation->table_id = $request->table_id;
        $reservation->start_time = Carbon::now()->setTimeFromTimeString($request->start_time)->format('Y-m-d H:i:s');
        $reservation->end_time = Carbon::now()->setTimeFromTimeString($request->end_time)->format('Y-m-d H:i:s');
        $reservation->save();

        $userCart = Cart::where('user_id', auth()->id())->get();

        $restaurantId = $userCart->first()->item->category->restaurant->id;

        $order = new Order();
        $order->reservation_id = $reservation->id;
        $order->note = $request->note;
        $order->restaurant_id = $restaurantId;
        $order->user_id = auth()->id();
        $order->save();

        foreach ($userCart as $cartItem) {

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->item_id = $cartItem->item_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->item->price;
            $orderItem->cost = $cartItem->item->cost;
            $orderItem->save();
        }
        return redirect()->route('cart.index')->with('success', 'Commande effectuée avec succès !');
    }



    public function view(){
        $userOrders = Order::where('user_id', auth()->id())->with('reservation', 'reservation.table', 'orderItems', 'orderItems.item')->get();
        return view('client.orders.index', ['orders' => $userOrders]);
    }
}
