<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id', 'nip','email','no_wa','nama','alamat','total_order','donasi_hsi','total','province_id','bukti_trf','no_invoice'
    ];

    public function city(){
    	return $this->belongsTo('App\City');
    }

    public function province(){
        return $this->belongsTo('App\Province');
    }

}
