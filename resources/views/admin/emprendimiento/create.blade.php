@extends('layouts.app')
@section('content')
<div class="container">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo_emprendimiento.css') }}" />
  <title>🏆EMPRENDIMIENTO</title>
</head>

<body>
  <div class="main">
    <div class="form-container-main">
      <img class="logo" src="https://deone.com.ec/wp-content/uploads/2022/07/marca-DeOne.com_.ec_-1-1024x688.png" alt="logo de la marca DeOne">
      <h1 class="title">🏆EMPRENDIMIENTO</h1>
      <h2 class="subtitle">Datos del proyecto emprendimiento</h1>


        <form class="form-main" action="{{url ('admin/emprendimiento')}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('admin.emprendimiento.formPerfil',['modo'=>'Crear'])
</form>
    </div>
  </div>
</body>

</html>
</div>
@endsection