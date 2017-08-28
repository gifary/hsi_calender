<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name','province_id','postal_code'
    ];


    public function provincy(){
    	return $this->belongsTo('App\Provincy');
    }

    public function district(){
    	return $this->hasMany('App\Provincy');
    }

}
