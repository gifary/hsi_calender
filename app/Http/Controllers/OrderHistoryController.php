<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\OrderHistory;
use Yajra\Datatables\Datatables;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class OrderHistoryController extends Controller
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
        return view('adminlte::order_history.index');
    }

    public function data(Datatables $datatables){
        $query = OrderHistory::with(["city","province"])->get();

        return $datatables
                            ->of($query)
                            ->addColumn('city_id',function($data){
                                return $data->city->name;
                            })
                            ->addColumn('province_id',function($data){
                                return $data->province->name;
                            })
                            ->make(true);
    }

    public function download(){
        $data = OrderHistory::with(["city","province"])->orderBy('created_at', 'DESC')->get();

        // Define the Excel spreadsheet headers
        $orderHisArry[] = ['NIP', 'Nama','NO WA','PROVINSI','KOTA/KAB','ALAMAT DETAIL','TOTAL ORDER','DONASI HSI'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($data as $d) {
            $orderHisArry[] = array(
                'NIP'  => $d->nip,
                'Nama'      => $d->nama,
                'NO_WA'    => $d->no_wa,
                'PROVINSI'     => $d->province->name,
                'KOTA'    => $d->city->name,
                'ALAMAT_DETAIL' => $d->alamat,
                'TOTAL_ORDER' => $d->total_order,
                'DONASI_HSI' => $d->donasi_hsi
            );
        }

        // Generate and return the spreadsheet
        \Excel::create('List_order', function($excel) use ($orderHisArry) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('List Order');
            $excel->setCreator('gifary');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('List_confirmation', function($sheet) use ($orderHisArry) {
                $sheet->fromArray($orderHisArry, null, 'A1', false, false);
            });

        })->download('xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($m_lokasi_id)
    {   
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $m_lokasi_id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}