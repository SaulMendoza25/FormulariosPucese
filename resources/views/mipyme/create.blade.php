
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
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
    body {
      margin: 0;
      font-family: 'Quicksand', sans-serif;
      /* background-color: papayawhip; */
      background: white;
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

    .form-container-main .form-main {
      display: grid;
      grid-template-columns: 1fr 1fr;
      column-gap: 50px;
    }

    .form-main .left {
      display: flex;
      flex-direction: column;
    }

    .form-main .right1 {
      display: flex;
      flex-direction: column;
     
    }
    .form-main .right {
      display: flex;
      flex-direction: column;
      margin-top: 65px;
    }
    .logo {
      width: 250px;
      margin-bottom: 20px;
      justify-self: center;
    }

    .title {
      font-size: var(--lg);
      margin-bottom: 12px;
      text-align: center;
    }

    .subtitle {
      color: black;
      font-size: 25px;
      font-weight: 300px;
      margin-top: 0;
      margin-bottom: 32px;
      text-align: left;
    }

    label {
      font-size: var(--sm);
      font-weight: bold;
      margin-bottom: 4px;
      cursor: pointer;
      margin-bottom: 5px;
    }

    .form-control {
      background-color: var(--text-input-field);
      border-radius: 8px;
      height: 30px;
      font-size: var(--md);
      padding: 6px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      transition: 0.2s box-shadow ease;
    }


    .primary-button {
      background-color: var(--hospital-green);
      border-radius: 8px;
      border: none;
      color: var(--white);
      width: 100%;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 50px;
      margin-top: 25px;
      text-align: center;
    }

    .combo {
      background-color: var(--text-input-field);
      border-radius: 8px;
      height: 50px;
      font-size: var(--md);
      padding: 6px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
    }

    .espacio {
      margin-top: 60px;
    }

    .comment {
      height: 120px;
      background-color: var(--text-input-field);
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: var(--md);
      padding: 6px;
      margin-bottom: 12px;
    }

    .form-file {
      border-radius: 8px;
      margin-top: 10px;
      margin-bottom: 10px;
      padding: 3%;

      border: 1px solid #ccc;
      background-color: var(--text-input-field);
    }

    .image_logo {
      border-radius: 8px;
      background-color: var(--text-input-field);

      border: none;
      margin: 15px;
    }
    .second-button {
      background-color: var(--hospital-green);
      border-radius: 8px;
      border: none;
      color: var(--white);
      width: 200px;
      line-height: 50px;
      display: block;
      cursor: pointer;
      font-size: var(--md);
      font-weight: bold;
      height: 50px;
      margin-top: 5px;
      text-align: center;
      display: block;
      text-decoration: none;
      margin-left:20px
    }
    .buttons{
      display:flex;

    }
    @media (max-width: 640px) {}
  </style>
  <title>🪃MIPYMES</title>
</head>

<body>
  <div class="main">
    <div class="form-container-main">
      <img class="logo" src="https://deone.com.ec/wp-content/uploads/2022/07/marca-DeOne.com_.ec_-1-1024x688.png" alt="logo de la marca DeOne">
      <h1 class="title">MIPYMES</h1>
      <h2 class="subtitle">Datos Generales</h1>
        <form class="form-main" action="{{url('/mipyme')}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('mipyme.form')
        </form>
    </div>
  </div>
</body>

</html>