<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use RajaOngkir;
use App\City;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class CityController extends Controller
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
        // $data = RajaOngkir::Kota()->all();
        
        // foreach ($data as $c) {
        //     $city = new City;
        //     $city->id = $c['city_id'];
        //     $city->province_id = $c['province_id'];
        //     $city->name = $c['city_name'];
        //     $city->postal_code = $c['postal_code'];
        //     $city->save();
        // }
        echo "done";
    }
}