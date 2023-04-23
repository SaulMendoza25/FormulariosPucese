
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 🏆 Datos de los Emprendimiento</title>
</head>
<style>
      :root {
      --white: #FFFFFF;
      --black: #000000;
      --very-light-pink: #C7C7C7;
      --text-input-field: #F7F7F7;
      --hospital-green: #ACD9B2;
      --sm: 14px;
      --md: 16px;
      --lg: 25px;
    }
    img{
        width: 100px;
    }
    .primary-button {
      background-color: var(--hospital-green);
      border-radius: 8px;
      border: none;
      color: var(--white);
      width: 200px;
      line-height: 25px;
      display: block;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 25px;
      margin-top: 5px;
      text-align: center;
      display: block;
      text-decoration: none;
    }
    .secundary-button {
      background-color: orange;
      border-radius: 8px;
      border: none;
      color: var(--white);
      width: 100%;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 25px;
      margin-top: 5px;
      text-align: center;
    }

    body {
    margin: 0;
    font-family: 'Quicksand', sans-serif;
  }
 .table{
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    
 }
 .table thead tr {
    background-color: var(--hospital-green);
    color: white;
    text-align: left;
    text-align: center;
}
.table th,td{
    padding: 12px 15px;
}
.table tbody tr {
    border-bottom: 1px solid var(--hospital-green);
}
.table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.table tbody tr:last-of-type {
    border-bottom: 2px solid var(--hospital-green);
}
.table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.button{
    display: flex;
    margin-left: 5px;
}
.calseta{
    margin: 5px;
}
</style>
<body>

<div class="button">  
<a href="{{url('emprendimiento/create')}}" class="primary-button calseta" value="">Nuevo Formulario</a>
<a href="{{url('mipyme')}}" class="primary-button calseta" value="" >Tabla de Mypimes</a>
<a href="{{route('logout')}}" class="primary-button calseta" type="button" value="" >Cerrar Sesion</a>
</div>  
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre del Proyecto</th>
            <th>Nombre(s) Propietario(s)</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo Electronico</th>
            <th>Productos Principales</th>
            <th>Imagen del producto principal</th>
            <th>Servicios Principales</th>
            <th>Fuente de Inversion Principal</th>
            <th>Rango de Inversion Principal</th>
            <th>Marca</th>
            <th>Numero de empleados</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin</th>
            <th>Requiere Capacitaciones</th>
            <th>Suba el Proyecto</th>
            <th>Logo</th>
            <th>Acciones</th>
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
            <td><img src="{{ asset('storage'). '/' .  $value->up_image_main_mark}}" alt=""></td>
            <td>{{$value->number_employees}}</td>
            <td>{{$value->start_date}}</td>
            <td>{{$value->end_date}}</td>
            <td>{{$value->theme_require_trainings}}</td>
            <td>{{$value->upload_proyect}}</td>
            <td><img src="{{asset('storage'). '/' . $value->up_image_logo}}" alt=""></td>
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