<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    protected $fillable = [
        'name','province_id','id','district_id','sector_id'
    ];
    

      
    function province(){

        return $this->belongsTo('App\Province');
      }

      function district(){

        return $this->belongsTo('App\District');
      }

      function sector(){

        return $this->belongsTo('App\Sector');
      }
}
