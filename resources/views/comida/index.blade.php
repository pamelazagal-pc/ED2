<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTAR pedido</title>

</head>
<body>

    @extends('layout.app')
    @section('content')

    <h1>PEDIDOS REGISTRADOS</h1>  
    <br>
    
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('pedido.create') }}" class="btn btn-primary mb-3 me-3">
            <i class="fa-solid fa-plus"></i>REGISTRAR PEDIDO
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
                <th>Platillos del pedido</th>
                <th>Mesa de orden</th>
                <th>Total del pago</th>
                <th>Tipo de pago</th>
                <th>Número de orden</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido as $pedido)
            <tr>
                <!-- Mostrar los datos de la base de datos -->
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->platillo }}</td>
                <td>{{ $pedido->mesa }}</td>
                <td>${{ $pedido->tipoPago }}</td>
                <td>{{ $pedido->numeroMesa }}</td>
                <td>{{ $pedido->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection
</body>
</html>
                    <a href="{{ route('pedido.edit', $pedido->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <!-- Formulario para eliminar -->
                    <form action="{{ route('pedido.destroy', $pedido->id) }}" method="POST" style="display:inline;">
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