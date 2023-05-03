<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\mypimes;
use App\Models\emprendimiento;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipo_usuario' => $data['tipo_usuario'],

            'password' => Hash::make($data['password']),
        ]);
        $datosemprendimiento = array("email"=>$user->email,"password"=>$user->password);
        if($user->tipo_usuario=="ya  existe"){
        // $user->assignRole("administrador");
        return $user;
    }  else if($user->tipo_usuario==1){
        emprendimiento::insert($datosemprendimiento);
        $user->assignRole("clienteEmprendimiento");
        return $user;
        }else{
        mypimes::insert($datosemprendimiento);
        $user->assignRole("clienteMypime");
        return $user;
        }
        
    }
    protected function redirectTo(){
        if(\Auth::user()->hasRole('administrador')){
            return"login";
        }
        if(\Auth::user()->hasRole('clienteEmprendimiento')){
            return"login";
        }
        if(\Auth::user()->hasRole('clienteMypime')){
            return"login";
        }
        
    
}
}
