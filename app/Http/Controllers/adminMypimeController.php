<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\mypimes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class adminMypimeController extends Controller
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
        $datos=DB::table('mypimes')
        ->select('*')->where('email','LIKE', '%' . $texto . '%')
        ->orWhere('RUC','LIKE', '%' . $texto . '%')
        ->orWhere('Business_name','LIKE', '%' . $texto . '%')
        ->orWhere('Category','LIKE', '%' . $texto . '%')
        ->orWhere('Products_or_services_details','LIKE', '%' . $texto . '%')
        ->orWhere('Address','LIKE', '%' . $texto . '%')
        ->orWhere('social_media','LIKE', '%' . $texto . '%')
        ->orWhere('Contact_telephone_number','LIKE', '%' . $texto . '%')
        ->orWhere('Trade_name','LIKE', '%' . $texto . '%')
        ->paginate(5);
        $contar=$datos->count();

        return view('admin/mypime.index',  compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/mypime.create');
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

            'Business_name'=>'required|string',
            'Trade_name'=>'required|string',
            'Number_of_collaborators'=>'required|int',
            'email'=>'required',
            'password'=>'required',
            'Formation_of_manager'=>'required|string',
            'Address'=>'required|string',
            'Province'=>'required|string',
            'County'=>'required|string',
            'Parish'=>'required|string',
            'Contact_telephone_number'=>'required|string',
            'Owner_Legal_representative'=>'required|string',
            'Gender_Representative'=>'required',
            'Number_of_establishments'=>'required|int',
            'Business_start_date'=>'required',
            'Category'=>'required|string',
            'Products_or_services_details'=>'required|string',

            'Coordinatesx'=>'required',
            'Coordinatesy'=>'required',
            'image'=>'required',


            
        ];
        $mensaje=[
              'Business_name.required'=>'El nombre del negocio es requerido',
              'Trade_name.required'=>'El nombre comercial es requerido',
              'Number_of_collaborators.required'=>'Los numeros de colaboradores es requerido',
              'email.required'=>'Correo Electronico es electrico',
              'password.required'=>'La clave es requerida',
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
              'Category.required'=>'La categoria es requerido',
              'Products_or_services_details.required'=>'Productos de servicios es requerido',
              'Coordinatesx.required'=>'La coodernada x es requerida',
              'Coordinatesy.required'=>'La coordenada y es requerida',
              'image.required'=>'La imagen es requerida',
        ];
        $this->validate($request,$campos,$mensaje);
        $datosmipymes = request()->except('_token');
        if ($request->hasFile('up_image_logo')){
            $datosmipymes['up_image_logo'] = $request->file('up_image_logo')->store('uploads', 'public');}
        if ($request->hasFile('image')){
            $datosmipymes['image'] = $request->file('image')->store('uploads', 'public');}   
        mypimes::insert($datosmipymes);
        $user=new User();
        $user->email=$request->email;
        $user->tipo_usuario=2;
        $user->estado=1;
        $user->password=Hash::make($request->password);
        $user->assignRole("clienteMypime");
        $user->save();
        return redirect('admin/mypime')->with('mensaje','mypime Agregado con exito🏆');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mypimes = mypimes::findOrFail($id);
        return view('admin/mypime.perfil', compact('mypimes'));
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
              'email.required'=>'Correo Electronico es electrico',
              'password.required'=>'La clave es requerida',
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
              'Category.required'=>'La categoria es requerido',
              'Products_or_services_details.required'=>'Productos de servicios es requerido',
              'Coordinates_x.required'=>'La coodernada x es requerida',
              'Coordinates_y.required'=>'La coordenada y es requerida',
              'image.required'=>'La imagen es requerida',
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
        $mypimes = mypimes::findOrFail($id);
        $hash= Hash::make($request->password);
     
       $updateUser= array("email"=> $request->email, "password"=> $hash);
        User::where('email','=',$mypimes->email)->update($updateUser);
        mypimes::where('id','=',$id)->update($datosmipymes);
        $mypimes = mypimes::findOrFail($id);
        
        redirect('admin/mipyme.perfil')->with('mensaje','Cambios Realizados Existosamente');
        return view('admin/mypime.perfil', compact('mypimes'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mypimes = mypimes::findOrFail($id);
        Storage::delete('public/'.$mypimes->up_image_logo);
        Storage::delete('public/'.$mypimes->image);
        mypimes::destroy($id);
        $usuario= user::select('*')->where('email','=', $mypimes->email)->first();
        user::destroy($usuario->id);
        return redirect('admin/mypime');
    }
}
