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
                "first_name"=>"Admin",
                "last_name"=>"Admin",
                "email"=>"Admin@admin.ru",
                "password"=>Hash::make("1234567"),
                "phone"=>"123456",
                "login"=>"Admin",
            ],
            [
                "first_name"=>"Anna",
                "last_name"=>"Admin",
                "email"=>"Anna_Admin@admin.ru",
                "password"=>Hash::make("1234567"),
                "phone"=>"123456",
                "login"=>"Anna",
            ]
        );
    }
}
