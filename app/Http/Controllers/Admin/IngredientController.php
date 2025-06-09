<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Item;
class IngredientController extends Controller
{
    public function index(){
        $ingredients = Ingredient::with('item')->get();
        return view('admin.ingredients.index',compact("ingredients"));
    }
    public function create(){
        $items = Item::all();
        return view('admin.ingredients.create',compact("items"));
    }
    public function store(Request $request){
        $ingredient = new Ingredient();
        $ingredient->name = $request->name;
        $ingredient->item_id = $request->item_id;
        $ingredient->save();
        return redirect()->route('ingredients.index');
    }
}
