<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <title>Libros</title>
</head>
<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <h2 class="logo">Librería<br>octavos</h2>

        <nav>
            <a href="#">Inicio</a>
            <a href="#">Favoritos</a>
            <a href="#">Mis libros</a>
            <a href="#">Explorar</a>
            <a href="#">Configuración</a>
        </nav>

        <a class="logout">Cerrar sesión</a>

    </aside>


    <!-- CONTENIDO -->
    <main class="main">

        <!-- TOP MENU -->
        <header class="topbar">

            <div class="menu-links">
                <a>Ver libros</a>
                <a>Descuentos</a>
                <a>Promociones</a>
                <a>Destacado</a>
            </div>

        </header>


        <!-- HERO SECTION -->
        <section class="hero">

            <div class="hero-text">

                <h1>EXPLORA LA<br>HISTORIA</h1>
                <p>
                Explora libros que te permitan
                vivir relatos históricos.
                </p>
                <button class="cta">
                Ver más
                </button>
            </div>


            <!-- LIBROS -->
            <div class="books">

                @foreach($history as $libro)

                    <div class="book">
                        <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] ?? '' }}">
                        <h4> {{ $libro['volumeInfo']['title'] ?? 'Sin título' }} </h4>
                        <p>  {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido' }} </p>
                    </div>

                @endforeach
            </div>

        </section>

        <section class="hero">

            <div class="hero-text">

                <h1>EXPLORA LA<br>HISTORIA</h1>
                <p>
                Explora libros que te permitan
                vivir relatos históricos.
                </p>
                <button class="cta">
                Ver más
                </button>
            </div>


            <!-- LIBROS -->
            <div class="books">

                @foreach($fantasy as $libro)

                    <div class="book">
                        <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] ?? '' }}">
                        <h4> {{ $libro['volumeInfo']['title'] ?? 'Sin título' }} </h4>
                        <p>  {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido' }} </p>
                    </div>

                @endforeach
            </div>

        </section>

    </main>

</div>

    
</body>
</html>