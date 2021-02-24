<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    public function store(Request $request)
    {
        try {
            //добавить валидацию данных
            $this->validate($request, [
                'name' => 'required|max:255',
            ]);

             $event = Event::create([
                'name' => $request['name'],
                'address' => $request['address'],
                'coordinates' => $request['coordinates'],
                'full_description' => $request['full_description'],
                'short_description' => $request['short_description'],
                'max_people_count' => $request['max_people_count'],
                'start_at' => $request['start_at'],
                'finish_at' => $request['finish_at'],
                'author_id' => $request['author_id'],
                'private' => $request['private'],
                'age_from' => $request['age_from'],
                'age_to' => $request['age_to'],
                'price' => $request['price'],
                'insta_link' => $request['insta_link'],
                'site_link' => $request['site_link'],
                'vk_link' => $request['vk_link'],
                'rating' => $request['rating'],
                'active' => $request['active'],
            ]);
        } catch (\Exception $e) {
            abort(401, 'Не удалось добавить данные');
        }
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
