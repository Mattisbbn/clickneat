<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Table;
use App\Models\Reservation;

class CartController extends Controller
{
    public function store(int $id){
        $userId = auth()->id();
        $cartItem = Item::where('id', $id)->first();
        $cartRestaurantId = $cartItem->category->restaurant->id;

        $existingCartItem = Cart::where('user_id', $userId)->where('item_id', $id)->first();

        $actualCard = Cart::where('user_id', $userId)->get();


        if(!$existingCartItem){
            if($actualCard->isNotEmpty()){
                if($cartRestaurantId !== $actualCard->first()->item->category->restaurant->id){
                    return back()->with('error', 'Vous ne pouvez pas ajouter des articles de restaurants différents au même panier !');
                }
            }

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

    // Incrémente la quantité d'un article dans le panier pour l'utilisateur connecté
    public function increment(int $id){
        // Récupère l'identifiant de l'utilisateur connecté
        $userId = auth()->id();
        // Recherche si l'article existe déjà dans le panier de l'utilisateur
        $existingCartItem = Cart::where('user_id', $userId)->where('item_id', $id)->first();

        if(!$existingCartItem){
            // Si l'article n'existe pas, on l'ajoute avec une quantité de 1
            $cart = new Cart();
            $cart->item_id = $id;
            $cart->user_id = $userId;
            $cart->quantity = 1;
            $cart->save();
        }else{
            // Si l'article existe déjà, on augmente la quantité de 1
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        }

        // Retourne à la page précédente avec un message de succès
        return back()->with('success', 'Article ajouté au panier !');
    }

    // Décrémente la quantité d'un article dans le panier pour l'utilisateur connecté
    public function decrement(int $id){
        // Récupère l'identifiant de l'utilisateur connecté
        $userId = auth()->id();
        // Recherche l'article dans le panier de l'utilisateur
        $existingCartItem = Cart::where('user_id', $userId)->where('item_id', $id)->first();

        if($existingCartItem->quantity === 1){
            // Si la quantité est 1, on retire l'article du panier
            $existingCartItem->delete();
        }else{
            // Sinon, on diminue la quantité de 1
            $existingCartItem->quantity -= 1;
            $existingCartItem->save();
        }

        // Retourne à la page précédente avec un message de succès
        return back()->with('success', 'Article retiré du panier !');
    }

    public function view(){
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)
                    ->with('item.category.restaurant')
                    ->get();
        $cartRestaurant = $cart->first()->item->category->restaurant->id;
        $tables = Table::where('restaurant_id', $cartRestaurant)->get();

        return view("cart.index",['tables'=>$tables]);
    }
}
