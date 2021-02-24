<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function save (Request $request){

        // Если пользователь авторезирован и уже имеется то надо с ним что-то сделать
        //if(Auth::check()){
        //
        //}

        $validateFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'login' => 'required',
            'password' => 'required',
            'phone' => 'required'
        ]);

        $user = User::create($validateFields);
        auth()->login($user);
    }
}
