@extends('layouts.app')

@section('content')



    

<title>Reportes</title>
<body class="body-tables">
<div class="container">
<h1>Mypimes</h1>

<div class="section1">   
<div class="form-row">
  <form action="{{route('mypime.index')}}" method="get">
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
<a href="{{url('admin/mypime/create')}}"   id="ok" class="enlaces" >Nuevo Formulario</a>
<a href="{{url('admin/emprendimientos')}}"  id="ok" class="enlaces"  >Tabla de Emprendimientos</a>
<div class="direcciones">
    {!!$datos->links()!!}
</div>

</div>  
<!-- <p>El numero de mypimes es de {{count($datos)}}</p> -->
<table class="tables styled-table" id="ok">
    <thead >
        <tr>
            <th><h1>#</th>
            <th><h1>RUC</h1></th>
            <th><h1>Razon Social</h1></th>
            <th><h1>Nombre Comercial</h1></th>
            <th><h1>Direccion</h1></th>
            <th><h1>Telefono</h1></th>
            <th><h1>Correo Electronico</h1></th>
            <th><h1>Numero de establecimientos</h1></th>
            <th><h1>Imagen del lugar</h1></th>
            <th><h1>Categoria</h1></th>

            <th><h1>Redes Sociales</h1></th>
            <th><h1>Acciones</h1></th>
        </tr>
    </thead>

    <tbody>
        @foreach($datos as $value)
        <tr>

            <td>{{$value->id}}</td>
            <td>{{$value->RUC}}</td>
            <td>{{$value->Business_name}}</td>
            <td>{{$value->Trade_name}}</td>
            <td>{{$value->Address}}</td>
            <td>{{$value->Contact_telephone_number}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->Number_of_establishments}}</td>
            <td><img src="{{asset('storage'). '/' . $value->image}}"></td>
            <td>{{$value->Category}}</td>
         
            <td>{{$value->social_media}}</td>
            <td class="actions"> <a class="btn btn-primary" href="{{url('admin/mypime/' .$value->id. '/edit')}}">Editar</a>  
            <form action="{{url('admin/mypime/'.$value->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE') }}
                    <input  class="btn btn-danger" type="submit" onclick="return confirm('Deseas realmente borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </div>
</table>

</div>
</body>

@endsection
