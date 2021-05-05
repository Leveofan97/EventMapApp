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
                'start_at'=>'required',
                'author_id' => 'required',
                'private'=> 'required',
                'max_people_count'=>'required',
                'category_id'=>'required',
            ]);
        }

    protected function getCategory(){
       return DB::table('categories')
           ->get();
    }

    protected function save(Request $data){
        if($data['category_id'] == null){
            abort(400,'Пустое поле категории');
        }
        else{
            $id = DB::table('events')->insertGetId([
                'name' => $data['name'],
                'address' => $data['address'],
                'coordinates' => $data['coordinates'],
                'short_description' => $data['short_description'],
                'full_description' => $data['full_description'],
                'start_at' => $data['start_at'],
                'max_people_count' => $data['max_people_count'],
                'finish_at' => $data['finish_at'],
                'author_id' => $data['author_id'],
                'private' => $data['private'],
                'active' => 0,
                'price' => $data['price'],
                'age_from'=>$data['age_from'],
                'age_to'=>$data['age_to'],
            ]);

            DB::table('event_category')->insert([
                'event_id'=>$id,
                'category_id'=>$data['category_id']
            ]);
        }
    }
     // Метод вывода всех событий
     public function index(Request $data)
     {
         $parameters = [];
         if($data['id'] == null) {
             if (Auth::check() == null) $parameters[] = ['private', '=', 0];
             $parameters[] = ['active', '=', 1];
             return DB::table('events')
                 ->select(
                     'events.id',
                     'events.name',
                     'events.address',
                     'events.start_at',
                     'categories.title_category')
                 ->where($parameters)
                 ->limit($data['limit'])
                 ->offset($data['offset'])
                 ->join('event_category', 'events.id', '=', 'event_category.event_id')
                 ->join('categories', 'event_category.category_id', '=', 'categories.id')
                 ->get();
         }else {
             $prm = [];
             $prm[] = $data['id'];
             return DB::table('events')
                 ->select(
                     'events.id',
                     'events.name',
                     'events.address',
                     'events.coordinates',
                     'events.full_description',
                     'events.short_description',
                     'events.max_people_count',
                     'events.start_at',
                     'events.finish_at',
                     'events.author_id',
                     'events.private',
                     'events.age_from',
                     'events.age_to',
                     'events.price',
                     'events.insta_link',
                     'events.site_link',
                     'events.vk_link',
                     'events.rating',
                     'categories.title_category')
                 ->where('events.id','=',$prm)
                 ->join('event_category', 'events.id', '=', 'event_category.event_id')
                 ->join('categories', 'event_category.category_id', '=', 'categories.id')
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
