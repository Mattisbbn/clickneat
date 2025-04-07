<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class LandpageController extends Controller
{
    public function view(){
        $restaurants = Restaurant::All();
        return view("client.index",['restaurants'=>$restaurants]);
    }
}
