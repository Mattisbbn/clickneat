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
            'start_time' => 'before_or_equal:end_time', // start_time doit être avant ou égal à end_time
            'end_time' => 'after_or_equal:start_time', // end_time doit être après ou égal à start_time
        ]);

        $reservation = new Reservation();
        $reservation->table_id = $request->table_id;
        $reservation->start_time = Carbon::now()->setTimeFromTimeString($request->start_time)->format('Y-m-d H:i:s');
        $reservation->end_time = Carbon::now()->setTimeFromTimeString($request->end_time)->format('Y-m-d H:i:s'); // Utilisation de carbon pour formater les dates
        $reservation->save(); // Sauvegarde de la réservation en base de données

        $userCart = Cart::where('user_id', auth()->id())->get(); // Récupération du panier de l'utilisateur

        $restaurantId = $userCart->first()->item->category->restaurant->id; // Récupération de l'id du restaurant

        $order = new Order(); // Création d'une nouvelle commande
        $order->reservation_id = $reservation->id; // Récupération de l'id de la réservation
        $order->note = $request->note; // Récupération de la note
        $order->restaurant_id = $restaurantId; // Récupération de l'id du restaurant
        $order->user_id = auth()->id(); // Récupération de l'id de l'utilisateur
        $order->save(); // Sauvegarde de la commande en base de données

        foreach ($userCart as $cartItem) {

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->item_id = $cartItem->item_id;
            $orderItem->name = $cartItem->item->name;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->item->price;
            $orderItem->cost = $cartItem->item->cost;
            $orderItem->save();
        } // Sauvegarde des items dans la table order_items pour les lier à la commande
        Cart::where('user_id', auth()->id())->delete(); // Suppression du panier de l'utilisateur
        return redirect()->route('cart.payment')->with('success', 'Commande validée, veuillez passer au paiement .'); // Redirection vers la page du paiement
    }



    public function view(){
        $userOrders = Order::where('user_id', auth()->id())->with('reservation', 'reservation.table', 'orderItems', 'orderItems.item')->get();
        return view('client.orders.index', ['orders' => $userOrders]);
    }


}
