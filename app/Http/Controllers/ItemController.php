<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = Item::all();
        return view("admin.items.index",compact("items"));
    }

    public function create(){
        $categories = Category::all();
        return view("admin.items.create",compact("categories"));
    }

    public function store(Request $request){
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price * 100;
        $item->cost = $request->cost * 100;
        $item->is_active = $request->is_active;
        $item->category_id = $request->category_id;
        $item->save();
        return redirect()->route("articles.index");
    }

    public function show($id){
        $item = Item::find($id);
        return view("admin.items.show",data: compact("item"));
    }

    public function edit($id){
        $article = Item::find($id);
        $categories = Category::all();
        return view("admin.items.edit",data: compact("article","categories"));
    }

    public function update(Request $request, $id){
        $article = Item::find($id);
        $article->name = $request->name;
        $article->description = $request->description;
        $article->price = $request->price * 100;
        $article->cost = $request->cost * 100;
        $article->save();
        return redirect()->route("articles.index");
    }

    public function destroy($id){
        $article = Item::find($id);
        $article->delete();
        return redirect()->route("articles.index");
    }
}
