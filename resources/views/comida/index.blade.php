<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTAR comida</title>

</head>
<body>

    @extends('layout.app')
    @section('content')

    <h1>COMIDAS REGISTRADAS</h1>  
    <br>
    
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('comida.create') }}" class="btn btn-primary mb-3 me-3">
            <i class="fa-solid fa-plus"></i>REGISTRAR COMIDA
        </a>
        
        <form action="{{ route('cerrar') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Cerrar sesión</button>
        </form>

    </div>
    <table border="1" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comida as $comida)
            <tr>
                <!-- Mostrar los datos de la base de datos -->
                <td>{{ $comida->id }}</td>
                <td>{{ $comida->nombre }}</td>
                <td>{{ $comida->descripcion }}</td>
                <td>{{ $comida->tipo }}</td>
                <td>${{ $comida->precio }}</td>
                <td>
                    <!-- Botón para editar -->
                    <a href="{{ route('comida.edit', $comida->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <!-- Formulario para eliminar -->
                    <form action="{{ route('comida.destroy', $comida->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar registro?')" type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection
</body>
</html>