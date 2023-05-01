<?php

namespace App\Http\Controllers;

use App\Models\emprendimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\User;

class EmprendimientoController extends Controller

{

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Auth::user();
        $emprendimiento= emprendimiento::select('*')->where('email','=', $user->email)->first();
      //  $emprendimiento = emprendimiento::findOrFail($id);
        return view('emprendimiento.perfil', compact('emprendimiento'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth::user();
        $emprendimiento= emprendimiento::select('*')->where('email','=', $user->email)->first();
      //  $emprendimiento = emprendimiento::findOrFail($id);
        return view('emprendimiento.perfil', compact('emprendimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     * @param  string  $id
     * 
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'name_proyect'=>'required|string|max:100',
            'name_property'=>'required|string|max:150',
            'addresses'=>'required|string|max:200',
            'phone_number'=>'required',

            'start_date'=>'required',
            'end_date'=>'required',
            'main_service'=>'required|string|max:200',
        
            'main_products'=>'required|string|max:200',
            'main_investment_source'=>'required|string|max:200',
            'principal_investment_range'=>'required|int|',
            'number_employees'=>'required|int|',
          
          
        ];
        $mensaje=[
              'name_proyect.required'=>'El nombre del proyecto es requerido',
              'name_property.required'=>'El nombre del propietario es requerido',
              'addresses.required'=>'La direccion es requerido',
              'phone_number.required'=>'El numero telefonico es requerido',
              'start_date.required'=>'La fecha de Inicio es requerido',
              'end_date.required'=>'La fecha final es requerida',
              'main_service.required'=>'El servicio principal es requerido',
              'main_products.required'=>'principales productos',
              'main_investment_source.required'=>'La fuente de inversion principales es requerida',
              'principal_investment_range.required'=>'El rango principal de investigacion es requerido',
              'number_employees.required'=>'Numero de empleados es requerido',

             
             
              
        ];
        $this->validate($request,$campos,$mensaje);

        $datosemprendimiento = request()->except(['_token','_method']);
        if ($request->hasFile('upload_proyect')){
            $deleteOldProyect=emprendimiento::findOrFail($id);
            Storage::delete('public/storage/'.$deleteOldProyect->upload_proyect);
            $datosemprendimiento['upload_proyect'] = $request->file('upload_proyect')->store('uploads-PDF', 'public');
        }
            
        if ($request->hasFile('up_image_logo')){
            $deleteOldImage=emprendimiento::findOrFail($id);
            Storage::delete('public/storage/'.$deleteOldImage->up_image_logo);
            $datosemprendimiento['up_image_logo'] = $request->file('up_image_logo')->store('uploads', 'public');
        }
            if ($request->hasFile('up_image_main_products')){
                $deleteOldImageMainPrododuct=emprendimiento::findOrFail($id);
                Storage::delete('public/storage/'.$deleteOldImageMainPrododuct->up_image_main_products);
                 $datosemprendimiento['up_image_main_products'] = $request->file('up_image_main_products')->store('uploads', 'public');
            }
            if ($request->hasFile('up_image_main_mark')){
                $deleteOldImageMainMark=emprendimiento::findOrFail($id);
                Storage::delete('public/storage/'.$deleteOldImageMainMark->up_image_main_mark);
            $datosemprendimiento['up_image_main_mark'] = $request->file('up_image_main_mark')->store('uploads', 'public');
            }
            
        emprendimiento::where('id','=',$id)->update($datosemprendimiento);
        $emprendimiento = emprendimiento::findOrFail($id);
        redirect('emprendimiento.perfil')->with('mensaje','Cambios Realizados Existosamente');
        return view('emprendimiento.perfil', compact('emprendimiento'));
    }



}
