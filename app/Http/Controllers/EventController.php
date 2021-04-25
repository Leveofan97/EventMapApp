<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    // Метод сохранения событий в базу
    protected function validator(array $data)
        {
            return Validator::make($data, [
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
        }

    protected function save(Request $data){
        if(Auth::check()){
            return Event::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'coordinates' => $data['coordinates'],
                'short_description' => $data['short_description'],
                'start_at' => $data['start_at'],
                'finish_at' => $data['finish_at'],
                'author_id' => $data['author_id'],
                'price' => $data['price'],
                'active' => '0',
            ]);
        }
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

    // Метод вывода всех событий в которых текущий пользователь автор
     public function eventorganize(){
        if (Auth::check()) {
            $user = Auth::user()->getAuthIdentifier();
            return DB::table('events')
                ->where('author_id','=',$user)
                ->get();
        }
    }
}
