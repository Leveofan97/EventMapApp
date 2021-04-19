<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
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
        Event::create(
            [
                "name" => "Event1",
                "address" => "Addres Event",
                "coordinates" => "[23.4582348,37.5062675]",
                "short_description" => "Short about event",
                "start_at" => "2021-04-23T18:25:43",
                "finish_at" => "2021-04-30T18:25:43",
                "author_id" => "1",
                "price" => "100",
                "active" => "0"
            ]
        );
        Event::create(
            [
                "name" => "Event2",
                "address" => "Addres Event",
                "coordinates" => "[23.4582348,37.5062675]",
                "short_description" => "Short about event",
                "start_at" => "2021-04-23T18:25:43",
                "finish_at" => "2021-04-30T18:25:43",
                "author_id" => "1",
                "price" => "100",
                "active" => "1"
            ]
        );
        Event::create(
            [
                "name" => "Event3",
                "address" => "Addres Event",
                "coordinates" => "[23.4582348,37.5062675]",
                "short_description" => "Short about event",
                "start_at" => "2021-04-23T18:25:43",
                "finish_at" => "2021-04-30T18:25:43",
                "author_id" => "1",
                "price" => "100",
                "active" => "1"
            ]
        );
        Event::create(
            [
                "name" => "Event4",
                "address" => "Addres Event",
                "coordinates" => "[23.4582348,37.5062675]",
                "short_description" => "Short about event",
                "start_at" => "2021-04-23T18:25:43",
                "finish_at" => "2021-04-30T18:25:43",
                "author_id" => "1",
                "price" => "100",
                "active" => "1"
            ]
        );
        Event::create(
            [
                "name" => "Event5",
                "address" => "Addres Event",
                "coordinates" => "[23.4582348,37.5062675]",
                "short_description" => "Short about event",
                "start_at" => "2021-04-23T18:25:43",
                "finish_at" => "2021-04-30T18:25:43",
                "author_id" => "1",
                "price" => "100",
                "active" => "1"
            ]
        );
        Event::create(
            [
                "name" => "Event6",
                "address" => "Addres Event",
                "coordinates" => "[23.4582348,37.5062675]",
                "short_description" => "Short about event",
                "start_at" => "2021-04-23T18:25:43",
                "finish_at" => "2021-04-30T18:25:43",
                "author_id" => "1",
                "price" => "150",
                "active" => "1"
            ]
        );
    }
}
