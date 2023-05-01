<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MypimesController;
use App\Http\Controllers\EmprendimientoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\adminEmprendimientoControlle;
use App\Http\Controllers\adminMypimeController;

use Spatie\Permission\Models\Role;
// Role::create(['name'=>'administrador']);
// Role::create(['name'=>'clienteEmprendimiento']);
// Role::create(['name'=>'clienteMypime']);

Route::get('/', function () {
    return view('auth/login');
});
/*Route::get('/formulario', function () {
    return view('mipyme.form');
});*/
//Route::get('/mipyme/create',[MypimesController::class,'create']);
// Route::view('/login',"login")->name('login');
// Route::view('/register',"register")->name('register');
// Route::post('/validar-registro',[LoginController::class,'register'])->name('validar-registro');
// Route::post('/Sesion-Iniciada',[LoginController::class,'login'])->name('iniciar-sesion');
// Route::get('/logout',[LoginController::class,'logout'])->name('logout');



Auth::routes();
Route::group(['middleware'=>['auth','role:administrador']],
function(){
    Route::resource('emprendimiento',EmprendimientoController::class);
    Route::resource('mipyme',MypimesController::class);

 Route::resource('admin/emprendimiento',adminEmprendimientoControlle::class);
Route::resource('admin/mypime',adminMypimeController::class);

});
Route::group(['middleware'=>['auth','role:clienteEmprendimiento']],
function(){
    Route::resource('emprendimiento',EmprendimientoController::class);

// Route::resource('admin/emprendimiento',adminEmprendimientoControlle::class);


});
Route::group(['middleware'=>['auth','role:clienteMypime']],
function(){
    Route::resource('mipyme',MypimesController::class);
   
});
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'redirectPath']);
