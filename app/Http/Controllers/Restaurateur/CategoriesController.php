<?php

namespace App\Http\Controllers\Restaurateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::whereHas('restaurant', function ($query) {
            $query->where('restaurant_id', auth()->user()->restaurant_id);
        })->get();
        return view("restaurateur.categories.index", ["categories" => $categories]);
    }
}
