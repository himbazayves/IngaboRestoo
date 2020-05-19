<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name','province_id','id'
    ];
    

      
    function province(){

        return $this->belongsTo('App\Province');
      }

      function sectors(){

        return $this->hasMany('App\Sectors');
      }

      function cells(){

        return $this->hasMany('App\Cells');
      }
}
