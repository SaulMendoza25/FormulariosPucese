
@extends('layouts.app')
@section('content')
<div class="container">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>🪃MIPYMES</title>
</head>

<body>
  <div class="main">
    <div class="form-container-main">
      <img class="logo" src="https://deone.com.ec/wp-content/uploads/2022/07/marca-DeOne.com_.ec_-1-1024x688.png" alt="logo de la marca DeOne">
      <h1 class="title">MIPYMES</h1>
      <h2 class="subtitle">Datos Generales</h1>



          <form class="form-main" action="{{url ('admin/mypime')}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('admin.mypime.formPerfil',['modo'=>'Crear'])
</form>

    </div>
  </div>
</body>

</html>
</div>
@endsection