
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<style>
      .main {
    width: 100%;
    height: 100vh;
    display: grid;
    place-items: center;

  }
  .form-container-main {
    display: grid;
    width: 1000px;
    padding: 20px;

  }
    .logo {
    width: 250px;
    margin-bottom: 20px;
    justify-self: center;
  }
</style>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 form-container-main">
            <img src="https://deone.com.ec/wp-content/uploads/2022/07/marca-DeOne.com_.ec_-1-1024x688.png" alt="" class="logo">
                <div class="card">
                    <div class="card-header">Registro</div>

                     <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif
                           <form method="post" action="{{ route('validar-registro') }}" id="form">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="registro"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tipo de registro') }}</label>
                                <div class="col-md-6">
                                <select id="tipo_registro" value="hola" name="tipo_registro" class="btn btn-primary">
                                        <option value="emprendimiento">Emprendimiento</option>
                                        <option value="mypime">Mypime</option>
                                    </select>
                                    <input  class="form-control" id="register" name="register" type="hidden">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                          
                                <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button id="btn"type="submit" class="btn btn-primary" >
                                        {{ __('Registrar') }}
                                    </button>
                                    <button id="btn"type="button" class="btn btn-primary" >
                                        {{ __('Iniciar Sesion') }}
                                    </button>
                                </div>
                               </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/validacionRegistro.js"></script>

</html>


