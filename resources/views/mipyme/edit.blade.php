
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo_mypime.css') }}" />

  <title>🪃MIPYMES</title>
</head>

<body>
  <div class="main">
    <div class="form-container-main">
      <img class="logo" src="https://deone.com.ec/wp-content/uploads/2022/07/marca-DeOne.com_.ec_-1-1024x688.png" alt="logo de la marca DeOne">
      <h1 class="title">MIPYMES</h1>
      <h2 class="subtitle">Datos Generales</h1>
        <form class="form-main" action="{{url('/mipyme/'. $mypimes->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          {{method_field('PATCH') }}
          @include('mipyme.formPerfil')
  </form>
    </div>
  </div>
</body>

</html>