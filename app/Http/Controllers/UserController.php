<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected function update(Request $data){
        if(Auth::check()) {
            if($data['id'] == null && $data['file']){
                abort(400,'Пустое поле ID или файл');
            }
            else {
                $id = DB::table('users')
                    ->where('id','=',$data['id'])
                    ->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'middle_name' => $data['middle_name'],
                    'login' => $data['login'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                ]);

                $folder = Config::get('filesystems.y_folder_user');
                $path = $data->file('file')->store($folder, 'yandexcloud');
                $ori_url = Storage::disk('yandexcloud')->url($path);

                $id_attachnemt= DB::table('attachments')->insertGetId([
                    'name'=>"test",
                    'original'=>$ori_url,
                    'thumbnail'=>'test',
                    'type'=>'jpg'
                ]);
                DB::table('user_avatar')->insert([
                    'attachment_id'=>$id_attachnemt,
                    'user_id'=>$data['id']
                ]);
            }
            return response()->json(['message' => 'Пользователь обновлен!'], 200);
        }
        return response()->json(['error' => 'Не авторизован'], 401);
    }
// Метод выдачи информации о пользователи (в карточку профиля)
    protected function index(Request $data){
        if(Auth::check()){
        $id = $data['id'];
        $result = DB::table('users')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        $result -> attachments_info = DB::table('user_avatar')
            ->select(
                'attachments.name',
                'attachments.original',
                'attachments.thumbnail',
                'attachments.type'
            )
            ->where('user_avatar.user_id', '=', $id)
            ->join('attachments', 'user_avatar.attachment_id', '=', 'attachments.id')
            ->get();
        return $result;
        }
        return response()->json(['error' => 'Не авторизован'], 401);
    }
}
