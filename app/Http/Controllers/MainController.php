<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Restaurent;
use DB;
use Auth;
use App\Client;
use App\Province;
use App\District;
use App\Sector;
use App\Cell;





class MainController extends Controller
{
  
public function __construct()
{
    $this->middleware(['verified','auth'])->except(['find_district','find_sector','find_cell']);;
}



    function index(){
        
        $user_id = Auth::user()->id;
        $res=Restaurent::where('user_id', '=', $user_id)->count();
        $cli=Client::where('user_id', '=', $user_id)->count();
           
        return view('main.home',['res'=>$res,'cli'=>$cli]);
    }

    function new_restaurent(){


        return view('main.new_restaurent');
    }


    function new_restaurent_handle(Request $request){
    
        
    $request->validate(['name' => 'required','province' =>'required' ,
    
    'district' =>'required','sector' =>'required','cell' =>'required', 'village' =>'required'] );
    
    $name=$request->input('name');
    $province=$request->input('province');
    $district=$request->input('district');
    $sector=$request->input('sector');
    $cell=$request->input('cell');
    $village=$request->input('village');
    $name=$request->input('name');
    $user_id = Auth::user()->id;

    $res = new Restaurent;
    $res->name=$name;
    $res->province=$province;
    $res->district=$district;
    $res->sector=$sector;
    $res->cell=$cell;
    $res->village=$village;
    $res->user_id=$user_id;
    $res->save();


    //return redirect()->back()->withmessage("Byakunze wabitse restora");;
        // view('main.new_restaurent');

        return redirect()->back()->with('message', 'Byakunze, wandikishije restora shya');
    }




    function my_restaurent(){
        $user_id = Auth::user()->id;
        $res=Restaurent::where('user_id', '=', $user_id)->get();
        $n=Restaurent::where('user_id', '=', $user_id)->count();
        return view('main.my_restaurent',['res'=>$res, 'n'=>$n]);
    }
    function new_client(){

    $provinces=Province::all();
    $cells=Cell::all();
    //$village=Village::all();
   // $vill=Province::all();
    $user_id = Auth::user()->id;
    $res=Restaurent::where('user_id', '=', $user_id)->get();

    return view('main.new_client',['res'=>$res,'provinces'=>$provinces,'cells'=>$cells,]);
    }


    function edit_restaurent($id){
      
        $res=Restaurent::find($id);
        return view('main.edit_restaurent',['res'=>$res]);



    }


   function  update_restaurent(Request $request){

    
    $request->validate(['name' => 'required','province' =>'required' ,
    
    'district' =>'required','sector' =>'required','cell' =>'required', 'village' =>'required'] );
    $res = Restaurent::find($request->input('id'));
    $name=$request->input('name');
    $province=$request->input('province');
    $district=$request->input('district');
    $sector=$request->input('sector');
    $cell=$request->input('cell');
    $village=$request->input('village');
    $name=$request->input('name');
    $user_id = Auth::user()->id;

    $res = new Restaurent;
    $res->name=$name;
    $res->province=$province;
    $res->district=$district;
    $res->sector=$sector;
    $res->cell=$cell;
    $res->village=$village;
    $res->user_id=$user_id;
    $res->update();


    return redirect()->route('my_restaurent')->with('message', 'Byakunze, guhindura Resitora ');
    }


    function delete_restaurent($id){

        $res = Restaurent::find($id);
        
        $res->delete();
        return redirect()->route('my_restaurent')->with('message', 'Byakunze, gusiba  Resitora ');


    }



    function new_client_handle(Request $request){
        $request->validate(['names' => 'required','province' =>'required' ,
    
        'district' =>'required','sector' =>'required','cell' =>'required', 'village' =>'required','arrival_date' =>'required','arrival_time' =>'required','tel' =>'required','restaurent' =>'required'] );
        
        $names=$request->input('names');
        $province=$request->input('province');
        $district=$request->input('district');
        $sector=$request->input('sector');
        $cell=$request->input('cell');
        $village=$request->input('village');
        $name=$request->input('name');
        $arrival_date=$request->input('arrival_date');
        $arrival_time=$request->input('arrival_time');
        $tel=$request->input('tel');
        $restaurent=$request->input('restaurent');

        $user_id = Auth::user()->id;
        
    
        $res = new Client;
        $res->names=$names;
        $res->province=$province;
        $res->district=$district;
        $res->sector=$sector;
        $res->cell=$cell;
        $res->tel=$tel;
        $res->village=$village;
        $res->arrival_date=$arrival_date;
        $res->arrival_time=$arrival_time;
        $res->restaurent_id=$restaurent;
        $res->user_id=$user_id;
        $res->save();
    
    
        //return redirect()->back()->withmessage("Byakunze wabitse restora");;
            // view('main.new_restaurent');
    
            return redirect()->back()->with('message', 'Byakunze, wandikishije umukiliya mushya');
    }


    function my_client(){

        $provinces=Province::all();
        $user_id = Auth::user()->id;
        $res=Client::where('user_id', '=', $user_id)
     
        ->latest()
        ->paginate(10);
        $n=Client::where('user_id', '=', $user_id)->count();
       
        
 
     
    
        return view('main.my_client',['res'=>$res,'provinces'=>$provinces,'n'=>$n])->with('i', (request()->input('page', 1) - 1) * 5);
    }


function edit_client($id){

    
$user_id = Auth::user()->id;
$res=Restaurent::where('user_id', '=', $user_id)->get();
$client=Client::find($id);
return view('main.edit_client',['client'=>$client,'res'=>$res]);

    }


    function update_client(Request $request){

    
        $request->validate(['names' => 'required','province' =>'required' ,
    
        'district' =>'required','sector' =>'required','cell' =>'required', 'village' =>'required','arrival_date' =>'required','arrival_time' =>'required','tel' =>'required','restaurent' =>'required'] );
        
        $res = Client::find($request->input('id'));
        $names=$request->input('names');
        $province=$request->input('province');
        $district=$request->input('district');
        $sector=$request->input('sector');
        $cell=$request->input('cell');
        $village=$request->input('village');
        $name=$request->input('name');
        $arrival_date=$request->input('arrival_date');
        $arrival_time=$request->input('arrival_time');
        $tel=$request->input('tel');
        $restaurent=$request->input('restaurent');

        $user_id = Auth::user()->id;
        
    
        $res->names=$names;
        $res->province=$province;
        $res->district=$district;
        $res->sector=$sector;
        $res->cell=$cell;
        $res->tel=$tel;
        $res->village=$village;
        $res->arrival_date=$arrival_date;
        $res->arrival_time=$arrival_time;
        $res->restaurent_id=$restaurent;
        $res->user_id=$user_id;
        $res->update();
    
    
        //return redirect()->back()->withmessage("Byakunze wabitse restora");;
            // view('main.new_restaurent');
    
            return redirect()->route('my_client')->with('message', 'Byakunze, guhindura umukiliya ');
        
            }


    function delete_client($id){

        $client = Client::find($id);
        
        $client->delete();
        return redirect()->route('my_client')->with('message', 'Byakunze, gusiba  umukiliya ');

    }


    function client_query(Request $request){


      
 
            $c = Client::query();
            $province=$request->input('province');
            
             $district=$request->input('district');
             $sector=$request->input('sector');
             $start=$request->input('start_date');
             $end=$request->input('end_date');
             $user_id = Auth::user()->id;
            
            $c=$c->where('user_id', '=', $user_id);
             if (!empty($province)) {
                $c = $c->where('province', $province);
            }
            
             if (!empty($district)) {
                $c = $c->where('district', $district);
            }
            
            if (!empty($start and $end)) {

                $request->session()->put('start',$start);
                $request->session()->put('end',$end);
            
                if($start!=$end)
                {
                  
                    $c=$c->whereBetween('created_at', [$start, $end]);
                }
            
                else{
                    $c = $c->where('created_at',$start);  
            
                }
             
            }
         
            
            
            
            
            $c = $c->get();
            $res=$c;
            
            if(count($res)>0){
            
            $number=count($res);
               
            $start =$request->session()->get('start');
            $end=$request->session()->get('end');

          
                
                return view('main.client_query',['start'=>$start,'end'=>$end])->withres($res)
                                                    ->withnumber($number);
                                                    
                
            }
            
            
            return redirect()->back()->with('message', 'Akayunguruzo nta mukiliya kabonye'); 
            
    }
   



    function report_query(Request $request){


      
 
        $c = Client::query();
       
         $start=$request->input('start_date');
         $end=$request->input('end_date');
         $user_id = Auth::user()->id;
        
        $c=$c->where('user_id', '=', $user_id);
         
        
        if (!empty($start and $end)) {
        
            if($start!=$end)
            {
              
                $c=$c->whereBetween('created_at', [$start, $end]);
            }
        
            else{
                $c = $vistors->where('created_at',$start);  
        
            }
         
        }
     
        
        
        
        
        $c = $c->get();
        $res=$c;
        
        if(count($res)>0){
        
        $number=count($res);
           
            return view('main.report_query')->withres($res)
                                                ->withnumber($number);
            
            
        }
        
        
        return redirect()->back()->with('message', 'Ayo matariki nta mukiriya wanditse'); 
        
}



        public function find_district($id)
        {
            //$userData['data'] = DB::table('sectors')
            //$district=District::where('name', '=', $id)->get();
     
            $province_id= Province::where('name','=',"$id")
           
            ->latest()
            ->first('id');
            $province_id =  $province_id['id'];
                    
           // $id=$district->id;
            $userData['data']= District::where('province_id', '=', $province_id)
           
            ->orderBy('name', 'asc')
            ->get();
        
         echo json_encode($userData);
         exit;
        }




        public function find_sector($id)
        {
            //$userData['data'] = DB::table('sectors')
            //$district=District::where('name', '=', $id)->get();
     
            $district_id= District::where('name', '=', $id)
            ->latest()
            ->first('id');
            $district_id =  $district_id['id'];
                    
           // $id=$district->id;
            $userData['data']= Sector::where('district_id', '=', $district_id)
           
            ->orderBy('name', 'asc')
            ->get();
        
         echo json_encode($userData);
         exit;
        }
     


        
        public function find_cell($id)
        {
            //$userData['data'] = DB::table('sectors')
            //$district=District::where('name', '=', $id)->get();
     
            $sector= Sector::where('name', '=', $id)
            ->latest()
            ->first('id');
            $sector=$sector['id'];
                    
           // $id=$district->id;
            $userData['data']= Cell::where('sector_id', $sector)
           
            ->orderBy('name', 'asc')
            ->get();
        
         echo json_encode($userData);
         exit;
        }
     



}
