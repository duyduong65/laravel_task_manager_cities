<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'firstName' => 'Lê Duy',
            'lastName' => 'Dương',
            'phone' => '0397487203',
            'address' => 'Phố Wall',
            'city_id' => 2,
            'image'=>"851039.jpg"
        ]);

        DB::table('customers')->insert([
            'firstName' => 'Nguyễn Thanh',
            'lastName' => 'Tùng',
            'phone' => '123456789',
            'address' => 'Phố Tàu',
            'city_id' => 1,
            'image'=>"851039.jpg"
        ]);

        DB::table('customers')->insert([
            'firstName' => 'Lê Danh',
            'lastName' => 'Quyền',
            'phone' => '01662263343',
            'address' => 'Phố Thị',
            'city_id' => 3,
            'image'=>"851039.jpg"
        ]);
        DB::table('customers')->insert([
            'firstName' => 'An Xuân',
            'lastName' => 'Bách',
            'phone' => '0987536233',
            'address' => 'Thanh Xuân',
            'city_id' => 4,
            'image'=>"851039.jpg"
        ]);

        DB::table('customers')->insert([
            'firstName' => 'Trần Mạnh',
            'lastName' => 'Hiệp',
            'phone' => '0948781258',
            'address' => 'Xuân Mai',
            'city_id' => 5,
            'image'=>"851039.jpg"
        ]);

        DB::table('customers')->insert([
            'firstName' => 'Nguyễn Đình',
            'lastName' => 'Đông',
            'phone' => '0543583474',
            'address' => 'Xuân Thủy',
            'city_id' => 6,
            'image'=>"851039.jpg"
        ]);

        DB::table('customers')->insert([
            'firstName' => 'Nguyễn Thị',
            'lastName' => 'Xoan',
            'phone' => '0976375272',
            'address' => 'Phố Nhổn',
            'city_id' => 7,
            'image'=>"851039.jpg"
        ]);
    }
}
