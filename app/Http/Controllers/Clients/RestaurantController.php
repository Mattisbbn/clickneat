<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseControllers\BaseRestaurantController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Restaurant;


class RestaurantController extends BaseRestaurantController{
    public function view(): View{
        $restaurants = Restaurant::all();
        return view("client.restaurants.index",["restaurants"=>$restaurants]);
    }
}
