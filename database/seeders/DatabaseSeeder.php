<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create(
            [
                "first_name"=>"Andrew",
                "last_name"=>"Admin",
                "email"=>"Andrew@admin.ru",
                "password"=>Hash::make("1234567"),
                "phone"=>"123456",
                "login"=>"Andrew",
            ]
        );
        User::create(
            [
                "first_name"=>"Anna",
                "last_name"=>"Admin",
                "email"=>"Anna@admin.ru",
                "password"=>Hash::make("1234567"),
                "phone"=>"123456",
                "login"=>"Anna",
            ]
        );
        User::create(
            [
                "first_name"=>"Vadim",
                "last_name"=>"Admin",
                "email"=>"Vadim@admin.ru",
                "password"=>Hash::make("1234567"),
                "phone"=>"123456",
                "login"=>"Vadim",
            ]
        );
    }
}
