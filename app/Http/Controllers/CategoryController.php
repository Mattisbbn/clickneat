<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View{

        $categories = Category::with('restaurant')->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function delete($categoryId): RedirectResponse{
        $category = Category::find($categoryId,["*"]);

        $category->delete();

        return redirect('/admin/categories');
    }

    public function show($categoryId): view{
        $category = Category::find($categoryId,["*"]);

        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit($categoryId): view{
        $category = Category::find($categoryId,["*"]);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request,$categoryId): RedirectResponse{
        $category = Category::find($categoryId,["*"]);

        $category->name = $request->input('name');
        $category->save();
        return redirect('/admin/categories');
    }


    public function create(Request $request): View{
        $restaurants = Restaurant::all();

        return view('admin.categories.create', ['restaurants' => $restaurants]);
    }


    public function store(Request $request): RedirectResponse{
        $category = new Category();

        $category->name = $request->name;
        $category->restaurant_id = $request->restaurantId;
        $category->save();
       return redirect()->route("categories.index");
    }

    public function destroy($categoryId): RedirectResponse{
        $category = Category::find($categoryId,["*"]);
        $category->delete();
        return redirect()->route("categories.index");
    }

}
