<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emprendimiento;
use App\Models\mypimes;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class LoginController extends Controller
{
       /**
     * Display the specified resource.
     *
     * @param  \App\Models\emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){
       // validar los datos
       $user=new User();
       $user->email=$request->email;
       $user->register=$request->register;
       $user->password=Hash::make($request->password);
       $user->save();
       Auth::login($user);
    
       $datosemprendimiento= array("email"=> $user->email, "password"=> $user->password);
        // request()->except(['_token','name','register','tipo_registro','password_confirmation']);
       if($user->register==="Emprendimiento"){
        emprendimiento::insert($datosemprendimiento);
       }else{
        mypimes::insert($datosemprendimiento);
       }
       return redirect()->intended(route('login'));

    }
    public function validate2($email){
        $datos= emprendimiento::select('id')->where('email', $email)->first();
        if(!is_null($datos)){
        return $datos;
        }
        $datosmipymes= mypimes::select('id')->where('email', $email)->first();;
        if(!is_null($datosmipymes)){
            return $datosmipymes;
        }
        return redirect()->intended(route('login'));
    }
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function login(Request $request){
       
        $credentials=[
            "email"=>$request->email,
            "password"=>$request->password,
        ];
        $remember=($request->has('remember')?true:false);
    
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();   
            
            $emprendimiento= emprendimiento::select('*')->where('email','=', $request->email)->first();

            if(!is_null($emprendimiento)){
            return view('emprendimiento.perfil', compact('emprendimiento'));
            }
            $mypimes= mypimes::select('*')->where('email', '=', $request->email)->first();;
            if(!is_null($mypimes)){
                return view('mipyme.perfil', compact('mypimes'));;
            }
            return redirect()->intended(route('login'));
        }
        else{
            return redirect('login');
        }
    }
    public function logout(Request $request){
  
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }

}
