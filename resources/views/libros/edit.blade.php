<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <h1>Editar libro: {{ $libro->nombre }} </h1>

    <form action="{{ route('libros.update', $libro) }}" method="POST">

        @csrf
        @method('PUT') <!-- Permite el uso de actualización -->

        <input type="text" name="nombre" value="{{ $libro->nombre }}" placeholder="Nombre">
        <br><br>
        <input type="text" name="autor" value="{{ $libro->autor }}" placeholder="Autor">
        <br><br>
        <input type="text" name="editorial" value="{{ $libro->editorial }}" placeholder="Editorial">
        <br><br>
        <input type="number" name="precio" value="{{ $libro->precio }}" placeholder="Precio">
        <br><br>

        <input type="submit" value="Guardar">

    </form>
    <br>
    <a href="{{ route('libros.index') }}"><button>Volver</button></a>
</body>
</html>