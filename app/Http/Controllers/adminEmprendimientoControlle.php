<?php

namespace App\Http\Controllers;

use App\Models\emprendimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class adminEmprendimientoControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
       
        // $datos['mypime'] = mypimes::paginate(5);
        $datos=DB::table('emprendimientos')
        ->select('*')->where('email','LIKE', '%' . $texto . '%')
        ->orWhere('name_proyect','LIKE', '%' . $texto . '%')
        ->orWhere('name_property','LIKE', '%' . $texto . '%')
        ->orWhere('addresses','LIKE', '%' . $texto . '%')
        ->orWhere('main_investment_source','LIKE', '%' . $texto . '%')
        ->orWhere('main_service','LIKE', '%' . $texto . '%')

        ->orWhere('phone_number','LIKE', '%' . $texto . '%')
        ->orWhere('main_products','LIKE', '%' . $texto . '%')
        ->orWhere('main_service','LIKE', '%' . $texto . '%')
        ->paginate(5);
        $contar=$datos->count();
        return view('admin/emprendimientos.index',  compact('datos','contar','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.emprendimientos.create');
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
            'name_proyect'=>'required|string',
            'name_property'=>'required|string',
            'addresses'=>'required|string',
            'phone_number'=>'required|string',
            'email'=>'required',
            'password'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'main_service'=>'required|string',
            'upload_proyect'=>'required',
            'main_products'=>'required|string',
            'main_investment_source'=>'required|string',
            'principal_investment_range'=>'required|int|',
            'number_employees'=>'required|int|',
            'up_image_main_products'=>'required',
            'up_image_main_mark'=>'required',

        ];
        $mensaje=[


              'name_proyect.required'=>'El nombre del proyecto es requerido',
              'name_property.required'=>'El nombre del propietario es requerido',
              'addresses.required'=>'La direccion es requerido',
              'phone_number.required'=>'El numero telefonico es requerido',
              'email.required'=>'El Correo es requerido',
              'password'=>'La clave es requerido',
              
              'start_date.required'=>'La fecha de Inicio es requerido',
              'end_date.required'=>'La fecha final es requerida',
              'main_service.required'=>'El servicio principal es requerido',
              'main_products.required'=>'principales productos',
              'main_investment_source.required'=>'La fuente de inversion principales es requerida',
              'principal_investment_range.required'=>'El rango principal de investigacion es requerido',
              'number_employees.required'=>'Numero de empleados es requerido',
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
        $user=new User();
        $user->email=$request->email;
        $user->tipo_usuario=1;
        $user->estado=1;
        $user->password=Hash::make($request->password);
        $user->assignRole("clienteEmprendimiento");
        $user->save();

        return redirect('admin/emprendimientos')->with('mensaje','Emprendedor Agregado con exito🏆');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $emprendimiento = emprendimiento::findOrFail($id);
        return view('admin/emprendimientos/perfil', compact('emprendimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'name_proyect'=>'required|string|max:100',
            'name_property'=>'required|string|max:150',
            'addresses'=>'required|string|max:200',
            'phone_number'=>'required',
            'email'=>'required',
            'password'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'main_service'=>'required|string|max:220',
        
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
              'email.required'=>'El Correo es requerido',
              'password'=>'La clave es requerido',
              'start_date.required'=>'La fecha de Inicio es requerido',
              'end_date.required'=>'La fecha final es requerida',
              'main_service.required'=>'El servicio principal es requerido el limite es de 200 caracteres',
              'main_products.required'=>'principales productos',
              'main_investment_source.required'=>'La fuente de inversion principales es requerida',
              'principal_investment_range.required'=>'El rango principal de investigacion es requerido',
              'number_employees.required'=>'Numero de empleados es requerido',
              'up_image_logo.required'=>'El logo es requerido',
             
             
              
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
      
        $emprendimiento = emprendimiento::findOrFail($id);
        $hash= Hash::make($request->password);
        $updateUser= array("email"=> $request->email, "password"=>$hash);
         User::where('email','=',$emprendimiento->email)->update($updateUser);
         emprendimiento::where('id','=',$id)->update($datosemprendimiento);
        $emprendimiento = emprendimiento::findOrFail($id);
         
        redirect('admin/emprendimiento/perfil')->with('mensaje','Cambios Realizados Existosamente');
        return view('admin/emprendimientos/perfil', compact('emprendimiento'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprendimiento = emprendimiento::findOrFail($id);
        Storage::delete('public/storage/'.$emprendimiento->upload_proyect);
        Storage::delete('public/storage/'.$emprendimiento->up_image_logo);
        Storage::delete('public/storage/'.$emprendimiento->up_image_main_products);
        Storage::delete('public/storage/'.$emprendimiento->up_image_main_mark);
        $usuario= user::select('*')->where('email','=', $emprendimiento->email)->first();
        user::destroy($usuario->id);
        emprendimiento::destroy($id);
                
        return redirect('admin/emprendimientos');
    }
}
