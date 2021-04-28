<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        //$statuses = Status::all();
        //$goods = Good::where('active', 1)->get();
        /*
        $data = collect([
            'user' => $user,
            'statuses' => $statuses,
            'goods' => $goods,
        ]);

        $data = $data->camelCaseKeys();
    */
        return Auth::guard('web')->user();
    }

    /*
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/user/login');
    }*/
}
