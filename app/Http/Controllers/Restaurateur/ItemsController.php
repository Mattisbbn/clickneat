<?php

namespace App\Http\Controllers\Restaurateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemsController extends Controller
{
    public function index(){
        $items = Item::whereHas('category', function ($query) {
            $query->where('restaurant_id', auth()->user()->restaurant_id);
        })->get();
        return view("restaurateur.items.index", ["items" => $items]);
    }

    public function create(){
        $categories = Category::whereHas('restaurant', function ($query) {
            $query->where('restaurant_id', auth()->user()->restaurant_id);
        })->get();
        return view("restaurateur.items.create", ["categories" => $categories]);
    }
}
