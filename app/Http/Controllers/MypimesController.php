<?php

namespace App\Http\Controllers;

use App\Models\mypimes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class MypimesController extends Controller
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
        $mypimes= mypimes::select('*')->where('email','=', $user->email)->first();
      //  $emprendimiento = emprendimiento::findOrFail($id);
        return view('mipyme.perfil', compact('mypimes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mypimes  $mypimes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Auth::user();
        $mypimes= mypimes::select('*')->where('email','=', $user->email)->first();
      //  $emprendimiento = emprendimiento::findOrFail($id);
        return view('mipyme.perfil', compact('mypimes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mypimes  $mypimes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[

            'Business_name'=>'required|string',
            'Trade_name'=>'required|string',
            'Number_of_collaborators'=>'required|int',
            'Formation_of_manager'=>'required|string',
            'Address'=>'required|string',
            'Province'=>'required|string',
            'County'=>'required|string',
            'Parish'=>'required|string',
            'Contact_telephone_number'=>'required',
            'Owner_Legal_representative'=>'required|string',
            'Gender_Representative'=>'required',
            'Number_of_establishments'=>'required|int',
            'Business_start_date'=>'required',
            'Category'=>'required|string',
            'Products_or_services_details'=>'required|string',

            'Coordinatesx'=>'required',
            'Coordinatesy'=>'required',


            
        ];
        $mensaje=[
              'Business_name.required'=>'El nombre del negocio es requerido',
              'Trade_name.required'=>'El nombre comercial es requerido',
              'Number_of_collaborators.required'=>'Los numeros de colaboradores es requerido',
              'Formation_of_manager.required'=>'La formacion del gerente o administrador es requerido',
              'Address.required'=>'La direccion es requerida',
              'Province.required'=>'La provincia es requerida',
              'County.required'=>'El canton es requerido',
              'Parish.required'=>'La parroquia es requerida',
              'Contact_telephone_number.required'=>'El telefono es requerido',
              'Owner_Legal_representative.required'=>'El titular o el representante es requerido',
              'Gender_Representative.required'=>'El genero representante es requerido',
              'Number_of_establishments.required'=>'El numero de establecimiento es requerido',
              'Business_start_date.required'=>'El fecha de inicio del negocio es requerido',
              'Category.required'=>'La categoria es requerida',
              'Products_or_services_details.required'=>'Productos de servicios es requerido',
              'Coordinatesx.required'=>'La coodernada x es requerida',
              'Coordinatesy.required'=>'La coordenada y es requerida',
        ];
        $this->validate($request,$campos,$mensaje);
        $datosmipymes = request()->except(['_token','_method']);
        if ($request->hasFile('up_image_logo')){
            $deleteOldImageLogo=mypimes::findOrFail($id);
            Storage::delete('public/'.$deleteOldImageLogo->up_image_logo);
            $datosmipymes['up_image_logo'] = $request->file('up_image_logo')->store('uploads', 'public');
           
        }
        if ($request->hasFile('image')){
        $deleteOldImage=mypimes::findOrFail($id);
        Storage::delete('public/'.$deleteOldImage->image);
        $datosmipymes['image'] = $request->file('image')->store('uploads', 'public');
        }
        mypimes::where('id','=',$id)->update($datosmipymes);
        $mypimes = mypimes::findOrFail($id);
        redirect('mipyme.perfil')->with('mensaje','Cambios Realizados Existosamente');
        return view('mipyme.perfil', compact('mypimes'));
    }


}
