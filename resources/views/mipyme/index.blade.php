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
    background-color: var(--hospital-green);
}

.table tbody tr:last-of-type {
    border-bottom: 2px solid var(--hospital-green);
}
.table tbody tr.active-row {
    font-weight: bold;
    color: var(--hospital-green);
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="button">
<a href="{{url('mipyme/create')}}" class="primary-button" value="">Nuevo Formulario</a>
<a href="{{url('emprendimiento')}}" class="primary-button calseta" value="" >Regresar</a>

</div>
</nav>  
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>RUC</th>
            <th>Nombre Comercial</th>
            <th>Razon Social</th>
            <th>Numeros de colaboradores</th>
            <th>Formacion del Gerente o Administrador</th>
            <th>Direccion</th>
            <th>Correo Electronico</th>
            <th>Provincia</th>
            <th>Canton</th>
            <th>Parroquia</th>
            <th>Telefonos Contactos</th>
            <th>Titular/Representante Legal</th>
            <th>Genero Representativo</th>
            <th>Logo</th>
            <th>Numero de Establecimientos</th>
            <th>Fecha de inicio del negocio</th>
            <th>Categoria</th>
            <th>Productos o servicios</th>
            <th>Comercio justo</th>
            <th>Comercio Exterior</th>
            <th>Coordenadas</th>
            <th>Imagen</th>
            <th>Comercio Electronico</th>
            <th>Requiere Capcitacion</th>
            <th>Pagina Web</th>
            <th>Redes Sociales</th>
            <th>Whatsapp</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mipymes as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->RUC}}</td>
            <td>{{$value->Business_name}}</td>
            <td>{{$value->Trade_name}}</td>
            <td>{{$value->Number_of_collaborators}}</td>
            <td>{{$value->Formation_of_manager}}</td>
            <td>{{$value->Address}}</td>
            <td>{{$value->E_mail_address}}</td>
            <td>{{$value->Province}}</td>
            <td>{{$value->County}}</td>
            <td>{{$value->Parish}}</td>
            <td>{{$value->Contact_telephone_number}}</td>
            <td>{{$value->Owner_Legal_representative}}</td>
            <td>{{$value->Gender_Representative}}</td>
            <td><img src="{{asset('storage'). '/' . $value->up_image_logo}}" alt="Image_logo"></td>
            <td>{{$value->Number_of_establishments}}</td>
            <td>{{$value->Business_start_date}}</td>
            <td>{{$value->Category}}</td>
            <td>{{$value->Products_or_services_details}}</td>
            <td>{{$value->Fair_trade_products}}</td>
            <td>{{$value->Foreign_trade}}</td>
            <td>{{$value->Coordinates}}</td>
            <td>
            <img src="{{asset('storage'). '/' . $value->image}}" alt="Image_Addresses">   </td>
            <td> {{$value->E_commerce}}</td>
            <td>{{$value->Requires_training}}</td>
            <td>{{$value->Web_page}}</td>
            <td>{{$value->social_media}}</td>
            <td>{{$value->Whatsapp}}</td>
            <td> <a class="primary-button" href="{{url('/mipyme/' .$value->id. '/edit')}}">Editar</a>  <form action="{{'/mipyme/'.$value->id }}" method="post">
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