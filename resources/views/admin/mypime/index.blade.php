@extends('layouts.app')

@section('content')
<div class="container">


    


<body class="body-tables">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 🏆 Datos de los Emprendimiento</title>
<div class="session">  
<a href="{{url('admin/mypime/create')}}" class="enlaces" >Nuevo Formulario</a>
<a href="{{url('admin/emprendimiento')}}" class="enlaces"  >Tabla de Emprendimientos</a>
</div>  
<table class="tables styled-table">
    <thead >
        <tr>
            <th><h1>#</th>
            <th><h1>RUC</h1></th>
            <th><h1>Nombre Comercial</h1></th>
            <th><h1>Direccion</h1></th>
            <th><h1>Telefono</h1></th>
            <th><h1>Correo Electronico</h1></th>
            <th><h1>Numero de establecimientos</h1></th>
            <th><h1>Imagen del lugar</h1></th>
            <th><h1>Provincia</h1></th>
            <th><h1>Canton</h1></th>
            <th><h1>Parroquia</h1></th>
            <th><h1>Acciones</h1></th>
        </tr>
    </thead>

    <tbody>
        @foreach($mypime as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->RUC}}</td>
            <td>{{$value->Trade_name}}</td>
            <td>{{$value->Address}}</td>
            <td>{{$value->Contact_telephone_number}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->Number_of_establishments}}</td>
            <td><img src="{{asset('storage'). '/' . $value->image}}"></td>
            <td>{{$value->Province}}</td>
            <td>{{$value->County}}</td>
            <td>{{$value->Parish}}</td>
            <td class="actions"> <a class="other-button" href="{{url('admin/mypime/' .$value->id. '/edit')}}">Editar</a>  
            <form action="{{url('admin/mypime/'.$value->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE') }}
                    <input  class="secundary-button" type="submit" onclick="return confirm('Deseas realmente borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</div>
@endsection
