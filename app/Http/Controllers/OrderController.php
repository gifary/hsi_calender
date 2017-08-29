<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Province;
use App\OrderHistory;
use RajaOngkir;
use App\Setting;
use Session;
use App\Mail\OrderShipped;
use Mail;
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
            'nama' => 'required|string|max:64',
            'email' => 'required|email',
            'no_wa' => 'required|numeric',
            'alamat' => 'required',
            'jumlah_order' => 'required|numeric|min:1',
            'donasi_hsi' => 'required',
        ]);

        //cek ongkir tersedia atatu tidak
        $kurir = $request->nama_kurir;
        if(empty($kurir)){
            session()->flash('error', 'Error');
            return back();
        }else{
            $setting = Setting::first();
            $max_id = OrderHistory::orderBy('created_at', 'desc')->first();
            $no_urut =1;
            if($max_id){
                $no_urut =  $max_id->id +1;
            }
            $index_urut="";
            for ($i=4; $i> strlen($no_urut) ; $i--) { 
                $index_urut.="0";
            }
            $order_history = new OrderHistory;
            $kurir = explode("-", $request->nama_kurir);
            $donasi_hsi = str_replace(",", '', $request->donasi_hsi);

            $data_order_history = $request->except(['nama_kurir','donasi_hsi']);

            $order_history->nama = $request->nama;
            $order_history->email = $request->email;
            $order_history->no_wa = $request->no_wa;
            $order_history->nip = $request->nip;
            $order_history->alamat = $request->alamat;
            $order_history->jumlah_order = $request->jumlah_order;
            $order_history->donasi_hsi = $donasi_hsi;
            $order_history->city_id = $request->city_id;
            $order_history->province_id = $request->province_id;
            $order_history->biaya_ongkir = (int)$kurir[2];
            $order_history->harga_kalender = $setting->harga;
            $order_history->nama_kurir = $kurir[0].'-'.$kurir[1];
            $order_history->total = ((int)$request->jumlah_order * $setting->harga) + (int)$kurir[2] + (int)$donasi_hsi+17;
            $order_history->no_invoice = "HSI-".date("Y")."-".$index_urut.$no_urut;
            $order_history->save();
            session()->flash('status', 'sukses');

            // $order = OrderHistory::find($order_history->id);   

            Mail::to($order_history->email)
            ->send(new OrderShipped($order_history));

            return redirect()->route('fe');
        }

        //notif ke email di atas

        // redirect ke page intruksi pembayaran
    }

    public function list_kurir($city_id,$jumlah_order){
        $setting = Setting::first();
        $data = RajaOngkir::Cost([
            'origin'        => $setting->city_id, // id kota asal
            'destination'   => $city_id, // id kota tujuan
            'weight'        => $jumlah_order * $setting->berat, // berat satuan gram
            'courier'       => 'jne', // kode kurir pengantar ( jne / tiki / pos )
        ])->get();
        $list_kurir= [];
        foreach ($data as $d) {
            foreach ($d['costs'] as $cost) {
               $list_kurir[] = array(
                    'index' => $d['code'].'-'.$cost['service'].'-'.$cost['cost'][0]['value'],
                    'nama' => strtoupper($d['code']).'-'.$cost['service'].'-Rp.'.number_format($cost['cost'][0]['value'],2).'-etd('.$cost['cost'][0]['etd'].')',
                );
            }
        }
        return $list_kurir;
    }
}