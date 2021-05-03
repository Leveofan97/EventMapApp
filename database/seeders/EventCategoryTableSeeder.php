<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategoryTableSeeder extends Seeder
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
                'category_id'=>rand(1,5),
                'event_id'=>$i,
            ];
        }
        DB::table('event_category')->insert($data);
    }
}
