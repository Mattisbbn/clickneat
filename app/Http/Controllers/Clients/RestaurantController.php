<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\BaseControllers\BaseRestaurantController;
use Illuminate\View\View;
use App\Models\Restaurant;
use App\Models\Item;


class RestaurantController extends BaseRestaurantController{
    public function view(): View{
        $restaurants = Restaurant::all();
        return view("client.restaurants.index",["restaurants"=>$restaurants]);
    }


    public function show(int $restaurantId, int $itemId): View{
        $restaurant = Restaurant::findOrFail($restaurantId);

        $item = Item::findOrFail($itemId);
        return view("client.items.show",["restaurant"=>$restaurant, "item"=>$item]);
    }
}
