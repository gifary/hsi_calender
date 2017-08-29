<?php

use Illuminate\Database\Seeder;
use App\Province;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = \RajaOngkir::Provinsi()->all();
        foreach ($data as $p) {
            $provinsi = new Province;
            $provinsi->id = $p['province_id'];
            $provinsi->name = $p['province'];
            $provinsi->save();
        }
    }
}
