<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Item;
class RestaurantController extends Controller
{


    public function view(): View{
        $restaurants = Restaurant::all();
        return view("admin.restaurants.index",["restaurants"=>$restaurants]);
    }

    public function show(int $restaurantId): View
    {
        $restaurant = Restaurant::with('categories.items')->findOrFail($restaurantId);
        return view('admin.restaurants.show', ["restaurant" => $restaurant]);
    }

     public function delete($id):RedirectResponse{
         $restaurant = Restaurant::find($id,["*"]);

         if ($restaurant) {
             $restaurant->delete();
         }

         return redirect()->route('restaurants.index');
     }

     public function edit(int $restaurantId): View{
            $restaurant = Restaurant::findOrFail($restaurantId);
            return view('admin.restaurants.edit', ["restaurant"=>$restaurant]);
     }

     public function update(Request $request, int $restaurantId): RedirectResponse{
            $restaurant = Restaurant::findOrFail($restaurantId);

            $restaurant->name = $request->name;
            $restaurant->save();

            return redirect()->route("restaurants.index");
     }

     public function create(): View{
            return view('admin.restaurants.create');
     }

     public function store(Request $request): RedirectResponse{
        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->save();

        return redirect()->route("restaurants.index");
     }

}
