<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>INICIO DE SESIÓN</h1>

    <form action="{{ route('acceso.store') }}" method="POST">
        @csrf
        
        <input type="email" name="email" placeholder="Correo Electrónico" class="form-control" required>
        <br>

        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br>

        <button type="submit" class="btn btn-success"> Iniciar Sesión </button>
        <br>
        <a href="{{ route('registro.store') }}" class="btn btn-secondary mt-2">
            <i class="fa-solid fa-user-plus"></i> Registrarse
        </a>
    
    </form>

    @endsection
    
</body>
</html>