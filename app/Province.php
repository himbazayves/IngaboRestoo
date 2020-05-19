<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
  
    protected $fillable = [
        'name','id'
    ];
    

      
    function districts(){

        return $this->hasMany('App\District');
      }

      function sectors(){

        return $this->hasMany('App\Sectors');
      }

      function cells(){

        return $this->hasMany('App\Cells');
      }

      
}
