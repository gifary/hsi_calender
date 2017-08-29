<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\Setting;
use Session;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $setting = Setting::first();
        $city = City::where("province_id",$setting->province_id)->pluck("name","id");
        $province = Province::pluck("name","id");
        return view('adminlte::setting.index',compact("setting","province","city"));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'province_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'berat' => 'required|numeric',
            'harga' => 'required',
        ]);
        $setting = Setting::find($id);
        $data_setting = $request->except(['harga']);
        $data_setting['harga'] = str_replace(",", "", $request->harga);
        $setting->update($data_setting);
        session()->flash('status', 'Task was successful!');
        return redirect()->route('setting');
    }
}