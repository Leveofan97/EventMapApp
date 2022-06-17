<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i = 1; $i<=20; $i++){
            $data [] = [
                'first_name'=>'Имя '.$i,
                'last_name'=>'Фамилия'.$i,
                'email'=>'user'.$i.'@testmailg.ru',
                'login'=>'Aboba'.$i,
                'password'=>bcrypt('1234567'),
                'is_active' => 1,
                'is_blocked' => 0,
                'is_moderator' => 0,
                'is_verified' => 0,
            ];
        }
        DB::table('users')->insert($data);
    }
}
