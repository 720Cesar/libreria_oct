<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>
    <h1>Libros disponibles</h1>
    
    <div style="display:flex; flex-wrap:wrap; gap:20px;">

        @foreach($libros as $libro)

        <div style="width:200px">
                <!-- Titulo del libro -->
                <h3>
                {{ $libro['volumeInfo']['title'] ?? 'Sin título' }}
                </h3>
                <!-- Autores de los libros (Solo mostrar 1) -->
                <p>
                {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido' }}
                </p>
                <!-- Si existen imágenes (thumbnail), se agrega su enlace -->
                @if(isset($libro['volumeInfo']['imageLinks']['thumbnail']))
                    <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] }}">
                @endif
        </div>

        @endforeach

    </div>

    
</body>
</html>