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
        'city_id', 'nip','email','no_wa','nama','alamat','jumlah_order','donasi_hsi','total','province_id','bukti_trf','no_invoice','harga_kalender','biaya_ongkir','nama_kurir'
    ];

    public function city(){
    	return $this->belongsTo('App\City');
    }

    public function province(){
        return $this->belongsTo('App\Province');
    }

    public function setNipAttribute($value)
    {
        $this->attributes['nip'] = strtoupper($value);
    }

    public function setNamaKurirAttribute($value)
    {
        $this->attributes['nama_kurir'] = strtoupper($value);
    }

}
