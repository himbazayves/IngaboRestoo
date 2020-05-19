<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'name','province_id','id','district_id'
    ];
    

      
    function province(){

        return $this->belongsTo('App\Province');
      }

      function district(){

        return $this->belongsTo('App\District');
      }

      function cells(){

        return $this->hasMany('App\Cell');
      }
}
