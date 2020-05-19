<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'names','province','district','sector','cell','village','arrival_date','arrival_time','tel'
    ];

    function restaurent(){

        return $this->belongsTo('App\Restaurent');
      }

      function user(){

        return $this->belongsTo('App\User');
      }


}
