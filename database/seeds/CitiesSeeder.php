<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'cityName'=>"Hà Nội"
            ]);
        DB::table('cities')->insert([
            'cityName'=>"Bắc Ninh"
        ]);
        DB::table('cities')->insert([
            'cityName'=>"Tuyên Quang"
        ]);
        DB::table('cities')->insert([
            'cityName'=>"Hòa Bình"
        ]);
        DB::table('cities')->insert([
            'cityName'=>"Phú Thọ"
        ]);
        DB::table('cities')->insert([
            'cityName'=>"Lạng Sơn"
        ]);
    }
}
