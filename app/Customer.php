<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'firstName','lastName','phone','address','city_id','image'
    ];

    function city(){
        return $this->belongsTo('App\City');
    }
}
