<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $authorized = Auth::guard('web')->attempt([
            'email' => $request['username'],
            'password' => $request['password'],
        ], true);
        if (!$authorized) abort(401, 'Неправильный логин или пароль');

        return Auth::guard('web')->user();
    }
}
