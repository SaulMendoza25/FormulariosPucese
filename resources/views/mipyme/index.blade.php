<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('/css/estilo_tables.css') }}">
    <title> 🏆 Datos de los Emprendimiento</title>
    
</head>
<body>
<div class="button">  
<a href="{{url('emprendimiento/create')}}" class="primary-button calseta" value="">Nuevo Formulario</a>
<a href="{{url('mipyme')}}" class="primary-button calseta" value="" >Tabla de Mypimes</a>
<a href="{{route('logout')}}" class="primary-button calseta" type="button" value="" >Cerrar Sesion</a>
</div>  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="button">
<a href="{{url('mipyme/create')}}" class="primary-button" value="">Nuevo Formulario</a>
<a href="{{url('emprendimiento')}}" class="primary-button calseta" value="" >Regresar</a>

</div>
</nav>  
<table class="container">
    <thead >
        <tr>
            <th><h1>#</h1></th>
            <th><h1>RUC</h1></th>
            <th><h1>Nombre Comercial</h1></th>
            <th><h1>Razon Social</h1></th>
            <th><h1>Direccion</h1></th>
            <th><h1>Correo Electronico</h1></th>
            <th><h1>Provincia</h1></th>
            <th><h1>Canton</h1></th>
            <th><h1>Telefonos Contactos</h1></th>
            <th><h1>Titular/Representante Legal</h1></th>
            <th><h1>Logo</h1></th>
            <th><h1>Numero de Establecimientos</h1></th>
            <th><h1>Categoria</h1></th>
            <th><h1>Comercio justo</h1></th>
            <th><h1>Comercio Exterior</h1></th>
            <th><h1>Requiere Capcitacion</h1></th>
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
                <th>Filter..</th>
                <th>Filter..</th>
                <th>Filter..</th>
                <th>Filter..</th>
           
            </tr>
    </thead>
    
    <tbody>
        @foreach($mipymes as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->RUC}}</td>
            <td>{{$value->Business_name}}</td>
            <td>{{$value->Trade_name}}</td>
            <td>{{$value->Address}}</td>
            <td>{{$value->E_mail_address}}</td>
            <td>{{$value->Province}}</td>
            <td>{{$value->County}}</td>
            <td>{{$value->Contact_telephone_number}}</td>
            <td>{{$value->Owner_Legal_representative}}</td>
            <td><img src="{{asset('storage'). '/' . $value->up_image_logo}}" alt="Image_logo"></td>
            <td>{{$value->Number_of_establishments}}</td>
            <td>{{$value->Category}}</td>
            <td>{{$value->Fair_trade_products}}</td>
            <td>{{$value->Foreign_trade}}</td>
            <td>{{$value->Requires_training}}</td>
            <td> <a class="primary-button" href="{{url('/mipyme/' .$value->id. '/edit')}}">Editar</a>  
            <form action="{{url('/mipyme/'.$value->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE') }}
                    <input class="secundary-button" type="submit" onclick="return confirm('Deseas realmente borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>