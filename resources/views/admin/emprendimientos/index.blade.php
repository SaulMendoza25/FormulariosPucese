@extends('layouts.app')

@section('content')
<div class="container">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body-tables">
<h1>Emprendimientos</h1>
<div class="section1">   
<div class="form-row">
    
  <form action="{{route('emprendimientos.index')}}" method="get">
    <div class="col-sm-4 my-11">
    <input type="text" class="form-control2" name="texto" >
    </div>
    </div>
    <div class="section1">   
    <div class="col-auto my">
        <input type="submit" class="btn btn-primary" value="Buscar">
    </div>
  </form>
</div>
</div> 
<div class="session">  
<a href="{{url('admin/emprendimientos/create')}}"  id="ok" class="enlaces">Nuevo Formulario</a>
<a href="{{url('admin/mypime')}}"  id="ok" class="enlaces"  >Tabla de Mypimes</a>
<div class="direcciones">
    {!!$datos->links()!!}
   
</div>
</div>  
<!-- <p>El numero de emprendimiento es de {{$contar}}</p> -->
<table class="tables styled-table"  id="ok">
    <thead >
        <tr>
            <th><h1>#</th>
            <th><h1>Nombre del Proyecto</h1></th>
            <th><h1>Nombre(s) Propietario(s)</h1></th>
            <th><h1>Direccion</h1></th>
            <th><h1>Telefono</h1></th>
            <th><h1>Correo Electronico</h1></th>
            <th><h1>Productos Principales</h1></th>
            <th><h1>Imagen del producto principal</h1></th>
            <th><h1>Servicios Principales</h1></th>
            <th><h1>Fuente de Inversion Principal</h1></th>
            <th><h1>Rango de Inversion Principal</h1></th>
            <th><h1>Proyecto PDF</h1></th>

            <th><h1>Acciones</h1></th>
        </tr>

    </thead>

    <tbody>

    
        @foreach($datos as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name_proyect}}</td>
            <td>{{$value->name_property}}</td>
            <td>{{$value->addresses}}</td>
            <td>{{$value->phone_number}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->main_products}}</td>
            <td><img src="{{asset('storage'). '/' . $value->up_image_main_products}}"></td>
            <td>{{$value->main_service}}</td>
            <td>{{$value->main_investment_source}}</td>
            <td>{{$value->principal_investment_range}}</td>
            <td>  <form action="https://form.deone.com.ec/public/storage/{{$value->upload_proyect}}">
            <button class="btn btn-primary">Abrir</button></form></td>
            <td class="actions"> <a class="btn btn-primary" href="{{url('admin/emprendimientos/' .$value->id. '/edit')}}">Editar</a>  
               
            <form action="{{url('admin/'.'emprendimientos/'.$value->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE') }}
                    <input  class="btn btn-danger" type="submit" onclick="return confirm('Deseas realmente borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
</div>
@endsection