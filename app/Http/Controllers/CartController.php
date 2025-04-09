<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(int $id){
        $userId = auth()->id();

        $existingCartItem = Cart::where('user_id', $userId)->where('item_id', $id)->first();


        if(!$existingCartItem){
            $cart = new Cart();
            $cart->item_id = $id;
            $cart->user_id = $userId;
            $cart->quantity = 1;
            $cart->save();
        }else{
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        }


        return back()->with('success', 'Article ajouté au panier !');
    }// Ajoute un nouvel item dans le panier.

    public function increment(int $id){
        $userId = auth()->id();
        $existingCartItem = Cart::where('user_id', $userId)->where('item_id', $id)->first();

        if(!$existingCartItem){
            $cart = new Cart();
            $cart->item_id = $id;
            $cart->user_id = $userId;
            $cart->quantity = 1;
            $cart->save();
        }else{
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        }


        return back()->with('success', 'Article ajouté au panier !');
    }
    public function decrement(int $id){
        $userId = auth()->id();
        $existingCartItem = Cart::where('user_id', $userId)->where('item_id', $id)->first();

        if($existingCartItem->quantity === 1){
            $existingCartItem->delete();
        }else{
            $existingCartItem->quantity -= 1;
            $existingCartItem->save();
        }

        return back()->with('success', 'Article retiré du panier !');
    }

    public function view(){
        return view("cart.index");
    }

}
