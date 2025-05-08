<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function view(){
        return view("guest.contact");
    }

    public function send(Request $request){
        $request->validate([
            "lastName" => "required",
            "firstName" => "required",
            "email" => "required|email",
            "object" => "required",
            "message" => "required",
        ]);

        return redirect()->back()->with("success", "Votre message a bien été envoyé");
    }
}
