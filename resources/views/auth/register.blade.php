<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')

    <h1>REGISTRO</h1>

    <form action="{{ route('registro.store') }}" method="POST">

        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="name" placeholder="Nombre" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="email" name="email" placeholder="Email" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="phone" placeholder="Telefono" class="form-control">
        </div> 

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="password" name="password" placeholder="Contraseña" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control">
        </div>

        <div class="form-check">
            <input type="checkbox" name="is_admin" value="1" class="form-check-input">
            <label class="form-check-label">Es administrador</label>
        </div>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>

    @endsection

</body>
</html>