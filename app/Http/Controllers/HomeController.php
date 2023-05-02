<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\mypimes;
use App\Models\emprendimiento;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        if(\Auth::user()->hasRole('administrador')){
            return redirect('admin/emprendimiento');
        }
        if(\Auth::user()->hasRole('clienteEmprendimiento')){
            $user=Auth::user();
            $emprendimiento= emprendimiento::select('*')->where('email','=', $user->email)->first();
            return redirect("emprendimiento/$emprendimiento->email/edit");
        }
        if(\Auth::user()->hasRole('clienteMypime')){
            $user=Auth::user();
            $mypime= mypimes::select('*')->where('email','=', $user->email)->first();
            return redirect("mipyme/$mypime->email/edit");
        }
        return "/";
        
    }
    
}
