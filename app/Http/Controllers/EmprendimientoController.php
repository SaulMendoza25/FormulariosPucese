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
    public function editUser($email,$password){
        $emprendimiento = emprendimiento::findOrFail($email);
        return view('emprendimientoUser', compact('emprendimiento'));
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
            Storage::delete('public/'.$deleteOldProyect->upload_proyect);
            $datosemprendimiento['upload_proyect'] = $request->file('upload_proyect')->store('uploads-PDF', 'public');
        }
            
        if ($request->hasFile('up_image_logo')){
            $deleteOldImage=emprendimiento::findOrFail($id);
            Storage::delete('public/'.$deleteOldImage->up_image_logo);
            $datosemprendimiento['up_image_logo'] = $request->file('up_image_logo')->store('uploads', 'public');
        }
            if ($request->hasFile('up_image_main_products')){
                $deleteOldImageMainPrododuct=emprendimiento::findOrFail($id);
                Storage::delete('public/'.$deleteOldImageMainPrododuct->up_image_main_products);
                 $datosemprendimiento['up_image_main_products'] = $request->file('up_image_main_products')->store('uploads', 'public');
            }
            if ($request->hasFile('up_image_main_mark')){
                $deleteOldImageMainMark=emprendimiento::findOrFail($id);
                Storage::delete('public/'.$deleteOldImageMainMark->up_image_main_mark);
            $datosemprendimiento['up_image_main_mark'] = $request->file('up_image_main_mark')->store('uploads', 'public');
            }
        emprendimiento::where('id','=',$id)->update($datosemprendimiento);
        $emprendimiento = emprendimiento::findOrFail($id);
        redirect('emprendimiento.edit')->with('mensaje','Cambios Realizados Existosamente');
        return view('emprendimiento.edit', compact('emprendimiento'));
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
        Storage::delete('public/'.$emprendimiento->upload_proyect);
        Storage::delete('public/'.$emprendimiento->up_image_logo);
        Storage::delete('public/'.$emprendimiento->up_image_main_products);
        Storage::delete('public/'.$emprendimiento->up_image_main_mark);
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
