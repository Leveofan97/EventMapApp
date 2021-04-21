<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    // Метод сохранения событий в базу
    public function save (Request $request){
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

    // Метод вывода всех событий в которых текущий пользователь авто
     public function eventorganize(){
        if (Auth::check()) {
            $user = Auth::user()->getAuthIdentifier();
            return DB::table('events')
                ->where('author_id','=',$user)
                ->get();
        }
    }
}
