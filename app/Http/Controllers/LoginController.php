<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emprendimiento;
use App\Models\mypimes;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->save();
       Auth::login($user);
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
            return redirect()->intended(route('emprendimiento.index'));
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
