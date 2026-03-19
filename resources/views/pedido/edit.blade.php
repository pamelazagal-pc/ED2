<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>EDITAR PEDIDO DE LA MESA: {{$pedido->mesa}}</h1>
    
    <!-- Todo: poner action-->
    <form action="{{route('pedido.update', $pedido->id)}}" method='POST'>
        <!-- proteccion de laravel para usar un formulario. OBLIGATORIO  -->
        @csrf 
        @method('PUT')
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" name="platillo" placeholder="Platillo" class="form-control" value="{{$pedido->platillo}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
            <input type="text" name="mesa" placeholder="Mesa" class="form-control" value="{{$pedido->mesa}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-list"></i></span>
            <input type="text" name="tipoPago" placeholder="Tipo de Pago" class="form-control" value="{{$pedido->tipoPago}}">
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="text" name="numeroPedido" placeholder="Número de Pedido" class="form-control"value="{{$pedido->numeroPedido}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="double" name="total" placeholder="Total" class="form-control"value="{{$pedido->total}}">
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
    </form>
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('pedido.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver
        </a>

    </div>
    @endsection


</body>
</html>