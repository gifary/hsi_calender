<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Province;
use App\OrderHistory;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $province = Province::pluck('name',"id");
        $province->prepend("Pilih Provinsi","");

        return view('adminlte::order',compact("province"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'province_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'nama' => 'required|string',
            'harga' => 'required',
            'email' => 'required|email',
            'no_wa' => 'required|numeric',
            'alamat' => 'required',
            'jumlah_order' => 'required|numeric|min:1',
            'donasi_hsi' => 'required',
        ]);

        //hitung ongkir 

        //notif ke email di atas

        // redirect ke page intruksi pembayaran
    }
}