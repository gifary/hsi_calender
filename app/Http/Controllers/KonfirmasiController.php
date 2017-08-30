<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\OrderHistory;
use Session;
use App\Mail\Konfirmasi;
use Mail;
use File;
use Illuminate\Support\Facades\Storage;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class KonfirmasiController extends Controller
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
    public function index($no_invoice='')
    {

        return view('adminlte::konfirmasi',compact("no_invoice"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'no_invoice' => 'required|exists:order_histories,no_invoice',
            'bukti_trf' => 'required|max:1024',
        ]);

        $pathLogo = $request->file('bukti_trf')->store('bukti_trf','public');

        $order_history = OrderHistory::where("no_invoice",$request->no_invoice)->first();
        $order_history->bukti_trf = $pathLogo;
        $order_history->save();

        session()->flash('status', 'Kami akan melakukan pengecekan');

        // $order = OrderHistory::find($order_history->id);   

        Mail::to($order_history->email)
        ->send(new Konfirmasi($order_history));

        return redirect()->route('fe');
    }
}