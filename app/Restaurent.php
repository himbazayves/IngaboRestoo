<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    protected $fillable = [
        'name','province','district','sector','cell','village',''
    ];

    function user(){

        return $this->belongsTo('App\User');
      }


      
    function clients(){

        return $this->hasMany('App\Client');
      }
}
