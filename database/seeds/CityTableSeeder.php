<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = \RajaOngkir::Kota()->all();
        
        foreach ($data as $c) {
            $city = new City;
            $city->id = $c['city_id'];
            $city->province_id = $c['province_id'];
            $city->name = $c['city_name'];
            $city->postal_code = $c['postal_code'];
            $city->save();
        }
    }
}
