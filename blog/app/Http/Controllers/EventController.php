<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    public function store(Request $request)
    {
        // Если пользователь авторезирован и уже имеется то надо с ним что-то сделать
        //if(Auth::check()){
        //
        //}

        $validateFields = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'coordinates' => 'required',
            'full_description' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'max_people_count' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required',
            'author_id' => 'required',
            'private' => 'required',
            'age_from' => 'required',
            'age_to' => 'required',
            'price' => 'required',
            'insta_link' => 'required|string|max:255',
            'site_link' => 'required|string|max:255',
            'vk_link' => 'required|string|max:255',
            'rating' => 'required',
            'active' => 'required'
        ]);

        $user = Event::create($validateFields);
    }


    /*
     // Контроллер вывода всех событий
     public function index()
     {
        // Можно добавить вызов представления куда будет класть данные
        $events = Event::all();

        foreach ($events as $event) {
            echo $event->name;
        }
    }

    */
}
