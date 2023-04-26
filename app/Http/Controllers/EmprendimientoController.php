<?php

namespace App\Http\Controllers;

use App\Models\emprendimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class EmprendimientoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['emprendimiento'] = emprendimiento::paginate(5);
        return view('emprendimiento.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('emprendimiento.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[
            'name_proyect'=>'required|string|max:100',
            'name_property'=>'required|string|max:150',
            'addresses'=>'required|string|max:200',
            'phone_number'=>'required|int|',
            'start_date'=>'required|date|',
            'end_date'=>'required|date|',
            'upload_proyect'=>'required',
            'main_service'=>'required|string|max:200',
            'upload_proyect'=>'required|string|mimes:pdf',
            'main_products'=>'required|string|max:200',
            'main_investment_source'=>'required|string|max:200',
            'principal_investment_range'=>'required|int|',
            'number_employees'=>'required|int|',
            'up_image_logo'=>'required|string|mimes:jpeg,png,jpg',
            'up_image_main_products'=>'required|string|mimes:jpeg,png,jpg',
            'up_image_main_mark'=>'required|string|mimes:jpeg,png,jpg',

        ];
        $mensaje=[
              'required'=> 'El :attribute es requerido',
              'up_image_logo.required'=>'El logo es requerido',
              'up_image_main_products.required'=>'La imagen del producto es requerido',
              'up_image_main_mark.required'=>'La imagen de la marca es requerida',
              'upload_proyect.required'=>'Subir el proyecto es requerido',

             
        ];
        $this->validate($request,$campos,$mensaje);
        // $datosemprendimiento = request()->all();

        $datosemprendimiento = request()->except('_token');
        if ($request->hasFile('upload_proyect'))

            $datosemprendimiento['upload_proyect'] = $request->file('upload_proyect')->store('uploads-PDF', 'public');
       
        if ($request->hasFile('up_image_logo'))
            $datosemprendimiento['up_image_logo'] = $request->file('up_image_logo')->store('uploads', 'public');

        if ($request->hasFile('up_image_main_products'))
            $datosemprendimiento['up_image_main_products'] = $request->file('up_image_main_products')->store('uploads', 'public');

        if ($request->hasFile('up_image_main_mark'))
            $datosemprendimiento['up_image_main_mark'] = $request->file('up_image_main_mark')->store('uploads', 'public');

        emprendimiento::insert($datosemprendimiento);
        return redirect('emprendimiento')->with('mensaje','Emprendedor Agregado con exito🏆');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function show(emprendimiento $emprendimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $emprendimiento = emprendimiento::findOrFail($id);
        return view('emprendimiento.edit', compact('emprendimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprendimiento = emprendimiento::findOrFail($id);
        Storage::delete('public/storage/'.$emprendimiento->upload_proyect);
        Storage::delete('public/storage/'.$emprendimiento->up_image_logo);
        Storage::delete('public/storage/'.$emprendimiento->up_image_main_products);
        Storage::delete('public/storage/'.$emprendimiento->up_image_main_mark);
        emprendimiento::destroy($id);
                
        return redirect('emprendimiento');
    }
    function validateSize(){
        $datosemprendimiento = request()->except(['_token','_method']);
        $sizePDF=filesize($request->file('upload_proyect'));
        $sizelogo=filesize($request->file('up_image_logo'));
        $size_product=filesize($request->file('up_image_logo'));
        $validate=true;
        if ($sizePDF>50 || $sizelogo>50 || $size_product>50){
            echo 'si son mayores';
            $validate=false;
            return  'si son mayores';
        }
        return   'si son mayores';
    }

}
