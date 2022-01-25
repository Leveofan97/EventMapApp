<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

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
    // Метод сохранения мероприятий
    protected function save(Request $data){

        if(Auth::check()) {

            if ($data['category_id'] == null) {
                abort(400, 'Пустое поле категории');
            } else {
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
                    'age_from' => $data['age_from'],
                    'age_to' => $data['age_to'],
                ]);

                DB::table('event_category')->insert([
                    'event_id' => $id,
                    'category_id' => $data['category_id']
                ]);
            }
        }
        return response()->json(['error' => 'Не авторизован'], 401);
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
     public function getMarkers(){
         $test =  DB::table('events')
             //->join('event_category', 'events.id', '=', 'event_category.event_id')
             //->join('categories', 'event_category.category_id', '=', 'categories.id')
             ->get();
         $original_data = json_decode($test, true);
         //var_dump($original_data);
         $features = array();

         foreach($original_data as $key => $value) {
             $features[] = array(
                 'type' => 'Feature',
                 'properties'=>array(
                     'id'=>$value['id'],
                     //'category_id '=>$value['category_id'],
                     'name'=>$value['name'],
                     'short_description'=>$value['short_description']
                 ),
                 'geometry' => array(
                     'type' => 'Point',
                     'coordinates' => json_decode($value['coordinates'])
                 ),
             );
         };
         $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
         return json_encode($allfeatures, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
     }
    public function dataFilter(Request $data){
        if (Auth::check() == null || !isset($data['private'])) $parameters[] = ['private', '=', 0];
        else
            $parameters[] = ['events.private', '=', $data['private']];
        $parameters[] = ['active', '=', 1];

        //    Не контролируем какие параметры приходят. Просто берем все и пытаемся делать запрос
//        foreach($data->all() as $key => $value){
//            if(strcmp($key, 'limit') && strcmp($key, 'offset') && isset($data[$key]))
//                $parameters[] = [($key == 'category_id' ? 'event_category.': 'events.') . $key, '=', $value];
//        }

        if(isset($data['name']))
            $parameters[] = ['events.name', 'LIKE', '%' . $data['name'] . '%'];
        if(isset($data['category_id']))
            $parameters[] = ['event_category.category_id', '=', $data['category_id']];
        if(isset($data['max_people_count']))
            $parameters[] = ['events.max_people_count', '=', $data['max_people_count']];
        if(isset($data['start_at']))
            $parameters[] = ['events.start_at', '>=', $data['start_at']];
        if(isset($data['finish_at']))
            $parameters[] = ['events.finish_at', '<=', $data['finish_at']];
        if(isset($data['age_from']))
            $parameters[] = ['events.age_from', '>=', $data['age_from']];
        if(isset($data['age_to']))
            $parameters[] = ['events.age_to', '<=', $data['age_to']];
        if(isset($data['price']))
            $parameters[] = ['events.price', '=', $data['price']];

        try {
            $res = DB::table('events')
                        ->select(
                            'events.id',
                            'events.name',
                            'events.short_description')
                        ->where($parameters)
                        ->limit($data['limit'])
                        ->offset($data['offset'])
                        ->join('event_category', 'events.id', '=', 'event_category.event_id')
                        ->get();
            return $res;
        }
        catch (\Illuminate\Database\QueryException $ex) {
            return [];
        }
}

    // Метод вывода всех событий в которых текущий пользователь автор
     public function eventorganize(Request $data){

        if(Auth::check()) {
            if ($data['user_id'] == null) {
                abort(400, 'Пустое поле id пользователя');
            } else {
                $user = $data['user_id'];
                return DB::table('events')
                    ->where('author_id', '=', $user)
                    ->get();
            }
        }
         return response()->json(['error' => 'Не авторизован'], 401);
    }

    // Метод вывода всех неактивных событий
    public function geteventsformoderate(){
        return DB::table('events')
            ->where('active','=',0)
            ->get();
    }
    // Метод удаления мероприятия (для модератора)
    public function deleteEvent(Request $data){
        if(Auth::check()){
            if($data['event_id'] == null){
                abort(400,'Пустое поле id мероприятия');
            }
            else{
                DB::table('event')
                    ->where('id','=',$data['event_id'])
                    ->delete();
                abort(200,'Мероприятие удалено');
            }
        }
        return response()->json(['error' => 'Не авторизован'], 401);
    }

    // Метод активации мероприятия (для модератора)
    public function activateEvent(Request $data){
        if(Auth::check()){
            if($data['event_id'] == null){
                abort(400,'Пустое поле id мероприятия');
            }
            else{
                DB::table('event')
                    ->where('id', '=', $data['event_id'])
                    ->update(['active' => 1]);
                abort(200,'Мероприятие опубликовано');
            }
        }
        return response()->json(['error' => 'Не авторизован'], 401);
    }

    // Метод записи на мероприятие
    public function eventmember(Request $data){
        if(Auth::check()){
            if($data['event_id'] == null){
                abort(400,'Пустое поле id мероприятия');
            }
            if($data['user_id'] == null){
                abort(400,'Пустое поле id пользователя');
            }
            else{
                DB::table('event_member')->insert([
                    'event_id' => $data['event_id'],
                    'user_id' => $data['user_id'],
                ]);
                abort(200,'Информация добавлена');
            }
        }
        return response()->json(['error' => 'Не авторизован'], 401);
    }
    // Метод отписки от мероприятия
    public function removemember(Request $data){
        if(Auth::check()) {
            if ($data['event_id'] == null) {
                abort(400, 'Пустое поле id мероприятия');
            }
            if ($data['user_id'] == null) {
                abort(400, 'Пустое поле id пользователя');
            } else {
                DB::table('event_member')
                    ->where('event_id', '=', $data['event_id'])
                    ->where('user_id', '=', $data['user_id'])
                    ->delete();
                abort(200, 'Информация удалена');
            }
        }
        return response()->json(['error' => 'Не авторизован'], 401);
    }
    //Метод вывода всех мероприятий на которые записан пользоватетель
    public function getmymemberevents(Request $data){
        if(Auth::check()) {
            if ($data['user_id'] == null) {
                abort(400, 'Пустое поле id пользователя');
            } else {
                $prm = $data['user_id'];
                return DB::table('event_member')
                    ->where('user_id', $prm)
                    ->join('events', 'event_member.event_id', '=', 'events.id')
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
                        'events.rating')
                    ->get();
            }
        }
        return response()->json(['error' => 'Не авторизован'], 401);
    }
    //Доделать а то хрень пока что!
    public function search(Request $data){
        //if($data['user_id'] == null){
        //    abort(400,'Пустое поле id пользователя');
        //}
        $search = $data['name'];
        return DB::table('events')
            ->where('name','LIKE', '%' . $search . '%')
            ->get();
    }
}
