<?php

namespace App\Http\Controllers\BaseControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\View\View;

class BaseRestaurantController extends Controller
{
    public function view(): View{
        $restaurants = Restaurant::all();
        return view("client.restaurants.index",["restaurants"=>$restaurants]);
    }
}
