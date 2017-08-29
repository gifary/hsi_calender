<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'province_id','city_id','berat','harga'
    ];


    public function provincy(){
    	return $this->belongsTo('App\Provincy');
    }

    public function city(){
    	return $this->belongsTo('App\City');
    }

}
