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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:7'],
        ]);

        $user = User::create($validateFields);
        auth()->login($user);
    }
}
