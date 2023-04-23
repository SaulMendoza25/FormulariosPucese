
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loguearse</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    .main {
    width: 100%;
    height: 100vh;
    display: grid;
    place-items: center;

  }

  .form-container-main {
    display: grid;
    width: 1500px;
    padding: 20px;

  }
  .second-button {
      background-color: var(--hospital-green);
      border-radius: 8px;
      color: var(--white);
      display: block;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      text-align: center;
      display: block;
    }
</style>
<body>
    <div class="table">

        <div class="row justify-content-center main">
            <div class="col-md-8 form-container-main" >
                <div class="card">
                    <div class="card-header">Iniciar Sesion</div>

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
                        <form method="post" action="{{ route('iniciar-sesion') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                              
                                    <button type="submit" class="btn btn-primary ">Iniciar Sesion</button>    
                               
                                    <a href="{{ url('register') }}"
                                    
                                            class="btn btn-primary mx-3">Registrarse</a>         
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
