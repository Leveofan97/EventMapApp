<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected function update(Request $data){
        $user = User::findOrFail($data['id']);
        $result = $this->validate($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'middle_name'=>'required',
            'login'=>'required',
            'phone'=>'required|numeric|unique:users'
        ]);
        $user->fill($result);
        $user->save();
        return response('Данные пользователя обновлены!',200);
    }
}
