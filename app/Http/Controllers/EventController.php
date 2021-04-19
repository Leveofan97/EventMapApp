<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
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



     // Метод вывода всех событий
     public function index()
     {
         if (Auth::check()) {
            return Event::all();

         }
         else{
         return DB::table('events')
             ->where('private', '=', 0)
             ->get();
         }
     }
}
