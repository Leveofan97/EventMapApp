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
            ];
        }
        DB::table('users')->insert($data);
    }
}
