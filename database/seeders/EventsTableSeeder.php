<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i = 1; $i<=200; $i++){
            $data [] = [
                'name'=>'Мероприятие '.$i,
                'address'=>'Адрес'.$i,
                'coordinates'=>'[61'.rand(230000,340000). ',73'.rand(160000,520000).']',
                'short_description'=>'Описание'.$i,
                'start_at'=>'2021-04-23T18:25:43',
                'finish_at'=>'2021-04-23T18:25:43',
                'author_id'=>rand(1,20),
                'private'=>rand(0,1),
                'age_from'=>rand(0,18),
                'age_to'=>rand(25,60),
                'max_people_count'=>rand(5,100),
                'price'=>rand(0,1000),
                'active' => rand(0,1),
            ];
        }
        DB::table('events')->insert($data);
    }
}
