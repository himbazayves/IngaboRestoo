<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Province;
use App\Cell;
use App\Restaurent;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        
        $name =$request->input('name');
        $tel = $request->input('tel');
        $email = $request->input('email');
        $pass= $request->input('password');
        $u=new User;
         $u->name=$name;
         $u->tel=$tel;
         $u->email=$email;
         $u->password=Hash::make($pass);

        $u->save();

        $user_id =$u->id;

    
    $resto_name=$request->input('resto_name');
    $province=$request->input('province');
    $district=$request->input('district');
    $sector=$request->input('sector');
    $cell=$request->input('cell');
//$village=$request->input('village');
    $name=$request->input('name');
   

    $res = new Restaurent;
    $res->name=$resto_name;
    $res->province=$province;
    $res->district=$district;
    $res->sector=$sector;
    $res->cell=$cell;
    //$res->village=$village;
    $res->user_id=$user_id;
    $res->save();
       
    
       // event(new User($user = $this->create($request->all())));
    
        return redirect($this->redirectPath('/my-client'))->with('message', 'You have registred susscfull!');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'max:10','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'resto_name' => ['required'],
            'province' =>['required'] ,
    
    'district' =>['required'],
    'sector' =>['required'],
    'cell' =>['required'], 
  
        ]);
    }


    public function showRegistrationForm()
{
    $province=Province::all();
    $cell=Cell::all();
    return view('auth.register', ['province'=>$province,'cell'=>$cell]);
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
