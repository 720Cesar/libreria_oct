<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/659e177ab2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Inicio de sesión</title>

</head>
<body>
    
    <div class="container">

        <div class="left-container">
            <!-- Logo principal del sistema -->
            <div class="logo">
                <h2>Librería Octavos <i class="fa-solid fa-book"></i></h2>
            </div>

            <h1>¡BIENVENIDO!</h1>
            <p class="message">Bienvenido de vuelta, ingresa tus datos por favor</p>
            <!-- Botones para el inicio de sesión y registro -->
            <div class="tabs">
                <a href="" class="tab active"> Inicio sesión </a>
                <a href="{{ route('registro') }}" class="tab inactive"> Registro </a>
            </div>

            <form action="{{ route('acceso.store') }}" method="POST">
                @csrf

                <div class="input-group">
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Contraseña">
                </div>

                <button type="submit" class="btn-primary">Enviar</button>

            </form>

        </div>

        <div class="right-container">
            <img src="{{ asset('images/login_library.jpg') }}" alt="Imagen principal">
        </div>

    </div>

    

</body>
</html>