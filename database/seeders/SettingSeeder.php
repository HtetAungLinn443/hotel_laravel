<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotel_settings')->truncate();
        DB::table('hotel_settings')->insert([
            'id' => '1',
            'name' => 'Softguide Hotel',
            'email' => 'softguide@gmail.com',
            'address' => 'No.(575B), Pyay Road, Hledan, Yangon',
            'check_in_time' => '09:43:00',
            'check_out_time' => '09:43:00',
            'phone' => '09 779009919',
            'size_unit' => 'mm²',
            'occupancy' => 'People',
            'price_unit' => 'Kyats',
            'logo_path' => 'img.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_by' => '1',
            'updated_by' => '1',
        ]);
    }
}
