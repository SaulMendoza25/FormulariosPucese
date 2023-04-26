
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 🏆 Datos de los Emprendimiento</title>
    <link rel="stylesheet" href="{{ URL::asset('/css/estilo_tables.css') }}">
</head>

<body>

<div class="button">  
<a href="{{url('emprendimiento/create')}}" class="primary-button calseta" value="">Nuevo Formulario</a>
<a href="{{url('mipyme')}}" class="primary-button calseta" value="" >Tabla de Mypimes</a>
<a href="{{route('logout')}}" class="primary-button calseta" type="button" value="" >Cerrar Sesion</a>
</div>  
<table class=" container">
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
            <th><h1>Acciones</h1></th>
        </tr>
        <tr>
                <th></th>
                <th>Filter..</th>
                <th>Filter..</th>
                <th>Filter..</th>
                <th>Filter..</th>
                <th>Filter..</th>
                <th>Filter..</th>
                <th></th>
                <th>Filter..</th>
                <th>Filter..</th>
                <th>Filter..</th>
           
            </tr>
    </thead>

    <tbody>
        @foreach($emprendimiento as $value)
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
            <td class="actions"> <a class="primary-button" href="{{url('/emprendimiento/' .$value->id. '/edit')}}">Editar</a>  
            <form action="{{url('/emprendimiento/'.$value->id) }}" method="post">
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
</html>
