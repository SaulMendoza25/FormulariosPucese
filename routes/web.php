<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MypimesController;
use App\Http\Controllers\EmprendimientoController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
/*Route::get('/formulario', function () {
    return view('mipyme.form');
});*/
//Route::get('/mipyme/create',[MypimesController::class,'create']);
Route::view('/login',"login")->name('login')->middleware('auth');
Route::view('/register',"register")->name('register')->middleware('auth');
// Route::view('/emprendimientoUser',"emprendimientoUser")->middleware('auth')->name('emprendimientoUser');
// Route::view('/mypimeUser',"mypimeUser")->middleware('auth')->name('mypimeUser');
Route::view('/privada',"secret")->middleware('auth')->name('privada');
Route::post('/validar-registro',[LoginController::class,'register'])->middleware('auth')->name('validar-registro');
Route::post('/iniciar-sesion',[LoginController::class,'login'])->middleware('auth')->name('iniciar-sesion');
Route::get('/logout',[LoginController::class,'logout'])->middleware('auth')->name('logout');



Route::resource('mipyme',MypimesController::class);
Route::resource('emprendimiento',EmprendimientoController::class);

Route::post('emprendimiento/{id}/perfil',[LoginController::class,'login'])->name('login.emprendimiento');
Route::post('mypime/{id}/perfil',[LoginController::class,'login'])->name('login.mypime');
