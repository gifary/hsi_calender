<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'province_id' => "9",
            'city_id' => "22",
            'berat' => 300,
            'harga' => 30000,
        ]);
    }
}
