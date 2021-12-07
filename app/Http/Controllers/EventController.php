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
    // Метод сохранения мероприятий
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

    // Метод вывода всех событий в которых текущий пользователь автор
     public function eventorganize(Request $data){
        if($data['user_id'] == null){
             abort(400,'Пустое поле id пользователя');
         }
         else {
             $user = $data['user_id'];
             return DB::table('events')
                ->where('author_id','=',$user)
                ->get();
         }
    }

    // Метод вывода всех неактивных событий
    public function geteventsformoderate(){
        //if (Auth::check()) {
            return DB::table('events')
                ->where('active','=',0)
                ->get();
        //}
    }
    // Метод записи на мероприятие
    public function eventmember(Request $data){
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
    public function removemember(Request $data){
        if($data['event_id'] == null){
            abort(400,'Пустое поле id мероприятия');
        }
        if($data['user_id'] == null){
            abort(400,'Пустое поле id пользователя');
        }
        else{
            DB::table('event_member')
                ->where('event_id','=',$data['event_id'])
                ->where('user_id','=',$data['user_id'])
                ->delete();
            abort(200,'Информация удалена');
        }
    }
    //Метод вывода всех мероприятий на которые записан пользоватетель
    public function getmymemberevents(Request $data){
        if($data['user_id'] == null){
            abort(400,'Пустое поле id пользователя');
        }
        else {
            $prm = $data['user_id'];
            return DB::table('event_member')
                ->where('user_id',$prm)
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
