<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
class AdministerController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol',['only'=>['index']]);
        $this->middleware('permission: |crear-rol|',['only'=>['create','store']]);
        $this->middleware('permission: |editar-rol|',['only'=>['edit','uptdate']]);
        $this->middleware('permission: |borrar-rol|',['only'=>['destroy']]);



    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administer=Role::paginate(5);
        return view('administer.index',compact('administer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission=Permission::get();
        return view ('admnister.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required','permission'=>'required']);
        $administer=Role::create(['name'=>$request->input('name')]);
        $administer->syncPermission($request-input('permission'));
        return redirect()->route('admnister.index');
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
        $role=Role::find($id);
        Permission::get();
        $administerPermission=DB::table('role_has_permissions')->where('role_has_permission_role_id')
        ->all();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
