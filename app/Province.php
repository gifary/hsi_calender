<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name',
    ];

    public function city(){
    	return $this->hasMany('App\City');
    }

}
