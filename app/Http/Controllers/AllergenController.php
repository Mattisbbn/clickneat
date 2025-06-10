<?php

namespace App\Http\Controllers;

use App\Models\Allergens;
use App\Models\Item;
use Illuminate\Http\Request;

class AllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allergens = Allergens::with('item')->get();
        return view('admin.allergens.index',compact('allergens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('admin.allergens.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $allergen = new Allergens();
        $allergen->name = $request->name;
        $allergen->item_id = $request->item_id;
        $allergen->save();
        return redirect()->route('allergens.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $allergen = Allergens::find($id);
        return view('admin.allergens.show',compact('allergen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $allergen = Allergens::find($id);
        $items = Item::all();
        return view('admin.allergens.edit',compact('allergen','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $allergen = Allergens::find($id);
        $allergen->name = $request->name;
        $allergen->item_id = $request->item_id;
        $allergen->save();
        return redirect()->route('allergens.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $allergen = Allergens::find($id);
        $allergen->delete();
        return redirect()->route('allergens.index');
    }
}
