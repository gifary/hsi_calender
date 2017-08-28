<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Province;
use RajaOngkir;
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
        echo "done";
    }
}