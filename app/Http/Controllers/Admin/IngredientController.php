<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index(){
        $ingredients = Ingredient::all();
        return view('admin.ingredients.index');
    }
}
