<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Province;
use RajaOngkir;
use App\City;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class ProvinceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        // $data = RajaOngkir::Provinsi()->all();
        // foreach ($data as $p) {
        //     $provinsi = new Province;
        //     $provinsi->id = $p['province_id'];
        //     $provinsi->name = $p['province'];
        //     $provinsi->save();
        // }
        $data = RajaOngkir::Cost([
            'origin'        => 501, // id kota asal
            'destination'   => 114, // id kota tujuan
            'weight'        => 1700, // berat satuan gram
            'courier'       => 'jne', // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
        dd($data);
    }

    public function get_city($id){
        $city = City::where("province_id",$id)->pluck("name","id");
        return $city;
    }
}