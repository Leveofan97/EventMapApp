<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i = 1; $i<=5; $i++){
            $data [] = [
                'name'=>'Категория'.$i,
                'color'=>'Цвет'.$i,
                ];
        }
        DB::table('categories')->insert($data);
    }
}
