@extends('layouts.app')
@section('content')
<div class="container">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>🏆EMPRENDIMIENTO</title>
</head>
<body>
  <div class="main">
    <div class="form-container-main">
      <img class="logo" src="https://deone.com.ec/wp-content/uploads/2022/07/marca-DeOne.com_.ec_-1-1024x688.png" alt="logo de la marca DeOne">
      <h1 class="title">🏆EMPRENDIMIENTO</h1>

      @if(Session::has('mensaje'))
      <h3 class="title">{{ Session::get('mensaje')}}</h1>
      @endif 
      <h2 class="subtitle">Datos del proyecto emprendimiento</h1>
        <form class="form-main" action="{{url ('admin/emprendimiento/'. $emprendimiento->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH') }}
        @include('admin.emprendimiento.formPerfil',['modo'=>'Guardar Datos'])
        <form>
    </div>
  </div>
</body>

</html>
</div>
@endsection