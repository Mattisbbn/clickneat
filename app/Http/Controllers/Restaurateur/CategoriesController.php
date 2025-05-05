<?php

namespace App\Http\Controllers\Restaurateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::whereHas('restaurant', function ($query) {
            $query->where('restaurant_id', Auth::user()->restaurant_id);
        })->get();
        return view("restaurateur.categories.index", ["categories" => $categories]);
    }

    public function create(){
        return view("restaurateur.categories.create");

    }

    public function store(Request $request){
        $request->validate([
            "name" => "required",
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->restaurant_id = Auth::user()->restaurant_id;
        $category->save();

        return redirect()->route("restaurateur.categories.index")->with("success", "Catégorie ajoutée avec succès");
    }

    public function edit($id){
        $category = Category::find($id);
        return view("restaurateur.categories.edit", ["category" => $category]);
    }

    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route("restaurateur.categories.index")->with("success", "Catégorie modifiée avec succès");
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route("restaurateur.categories.index")->with("success", "Catégorie supprimée avec succès");
    }
}
