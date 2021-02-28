<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class RegisterEvent extends Controller
{
    public function save (Request $request){

    // Если пользователь авторезирован и уже имеется то надо с ним что-то сделать
    //if(Auth::check()){
    //
    //}

        $validateFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'max:255'],
            'coordinates' => 'required',
            'short_description' => ['required', 'string', 'max:255'],
            'start_at' => 'required',
            'finish_at' => 'required',
            'author_id' => 'required',
            'price' => 'required',
            'active' => 'required',
        ]);
        $user = Event::create($validateFields);
    }
}
