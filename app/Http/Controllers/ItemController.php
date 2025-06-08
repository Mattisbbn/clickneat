<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = Item::all();
        return view("admin.items.index",compact("items"));
    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
