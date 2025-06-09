<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class RestaurantController extends Controller
{
    public function index(): View{
        $restaurants = Restaurant::all();
        return view("admin.restaurants.index",["restaurants"=>$restaurants]);
    }

    public function show(int $restaurantId): View
    {
        $restaurant = Restaurant::with('categories.items')->findOrFail($restaurantId);
        return view('client.restaurants.show', ["restaurant" => $restaurant]);
    }

     public function destroy($id):RedirectResponse{
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
        $restaurant->address = $request->address;
        $restaurant->opening_hours = $request->opening_hours;
        $restaurant->closing_hours = $request->closing_hours;
        $restaurant->save();

        return redirect()->route("restaurants.index");
     }

}
