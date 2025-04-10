<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function validate(Request $request){
        $request->validate([
            'table_id' => 'required',
            'note' => 'nullable',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);


        // $reservation = new Reservation();
        // $reservation->table_id = $request->table_id;
        // $reservation->start_time = now();
        // $reservation->end_time = now()->addHour();
        // $reservation->save();

        dd($request->all());
    }
}
