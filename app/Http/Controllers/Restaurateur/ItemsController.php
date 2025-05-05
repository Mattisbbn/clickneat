<?php

namespace App\Http\Controllers\Restaurateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;

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

    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "price" => "required",
            "cost" => "required",
            "description" => "required",
            "category_id" => "required",
            "image" => "required|file|image|mimes:jpeg,png,jpg,gif|max:2048",
            "is_active" => "boolean|nullable",
        ]);

        try {
            $restaurantId = auth()->user()->restaurant_id;

            // Créer le dossier s'il n'existe pas
            $directory = storage_path('app/public/restaurants/' . $restaurantId . '/items');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Générer un nom de fichier unique aléatoire
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = Str::random(32) . '.' . $extension;

            // Déplacer le fichier
            $request->file('image')->move($directory, $filename);

            // Créer le chemin relatif
            $imagePath = 'restaurants/' . $restaurantId . '/items/' . $filename;

            $item = new Item();
            $item->name = $request->name;
            $item->price = floatval($request->price) * 100;
            $item->cost = floatval($request->cost) * 100;
            $item->category_id = $request->category_id;
            $item->description = $request->description;
            $item->image_url = $imagePath;
            $item->is_active = $request->has('is_active') ? true : false;
            $item->save();
            return redirect()->route("restaurateur.items.index")->with('success', 'Article créé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'upload de l\'image : ' . $e->getMessage());
        }
    }

    public function edit(Item $item){
        $categories = Category::whereHas('restaurant', function ($query) {
            $query->where('restaurant_id', auth()->user()->restaurant_id);
        })->get();
        return view("restaurateur.items.edit", ["item" => $item, "categories" => $categories]);
    }

    public function update(Request $request, Item $item){
        $request->validate([
            "name" => "required",
            "price" => "required",
            "cost" => "required",
            "description" => "required",
            "category_id" => "required",
        ]);

        $is_active = $request->has('is_active') ? true : false;

        $item->name = $request->name;
        $item->price = floatval($request->price) * 100;
        $item->cost = floatval($request->cost) * 100;
        $item->category_id = $request->category_id;
        $item->description = $request->description;
        $item->is_active = $is_active;
        $item->save();
        return redirect()->route("restaurateur.items.index")->with('success', 'Article modifié avec succès');
    }


    public function destroy(Item $item){
        $item->delete();
        return redirect()->route("restaurateur.items.index")->with('success', 'Article supprimé avec succès');
    }
}
