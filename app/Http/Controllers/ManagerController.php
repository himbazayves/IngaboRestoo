<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurent;
use DB;
use Auth;
use App\Client;
use App\Province;
use App\District;
use App\Sector;
use App\Cell;

class ManagerController extends Controller

{
    
    public function __construct()
{
    $this->middleware('auth');
}

    
    function home(){

        $restaurent=Restaurent::all()->count();
        $client= Client::all()->count();
        $username = Auth::user()->name;
        return view('manager.home',['username'=>$username,'restaurent'=>$restaurent,'client'=>$client]);
    }


function restaurent(){

$restaurent=Restaurent::all();

return view('manager.restaurent',['restaurent'=>$restaurent]);
    }


 function client(){

$client=Client::all();
$provinces=Province::all();

return view('manager.client',['client'=>$client,'provinces'=>$provinces]);
    
    }
        
function client_query(Request $request){



    $client = Client::query();
    $province=$request->input('province');
    
     $district=$request->input('district');
     $sector=$request->input('sector');
     $start=$request->input('start_date');
     $end=$request->input('end_date');
     
   
     if (!empty($province)) {
        $client = $client->where('province', $province);
    }
    
     if (!empty($district)) {
        $client = $client->where('district', $district);
    }
    
    if (!empty($start and $end)) {
    
        if($start!=$end)
        {
          
            $client=$client->whereBetween('arrival_date', [$start, $end]);
        }
    
        else{
            $client = $client->where('arrival_date',$start);  
    
        }
     
    }
 
    
    
    
    
    $client = $client->get();
   
   
    
    if(count($client )>0){
    
    $number=count($client );
       
        return view('manager.client_query')->withclient($client )
                                            ->withnumber($number);
        
        
    }
    
    
    return redirect()->back()->with('message', 'No result fount for your query'); 
    
}







}
