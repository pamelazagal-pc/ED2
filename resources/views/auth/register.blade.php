<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    @extends('layouts.app')
    @section('content')

    <h1>REGISTRO DE PERSONAL</h1>

    <form action="{{ route('registro.store') }}" method="POST">
        @csrf
        
        <input type="text" name="name" placeholder="Nombre" class="form-control" required>
        <br>

        <input type="text" name="edad" placeholder="Edad" class="form-control" required>
        <br>

        <input type="email" name="email" placeholder="Correo Electrónico" class="form-control" required>
        <br>

        <input type="text" name="phone" placeholder="Teléfono" class="form-control" required>
        <br>

        <input type="text" name="direccion" placeholder="Dirección" class="form-control" required>
        <br>

        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br>

        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control" required>
        <br>

        @auth
            @if(auth()->user()->is_admin)    
                <div class="form-check">
                    <input type="checkbox" name="is_admin" value="1">
                    <label >Es administrador</label>
                </div>
            @endif
        @endauth
        
        <br>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar </button>

        <br>
            <a href="{{ route('acceso') }}" class="btn btn-secondary mt-2">
                <i class="fa-solid fa-arrow-left"></i> Volver al inicio de sesión
            </a>
    </form>

    @endsection
</body>
</html>