<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar pedido</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <h1>REGISTRAR PEDIDO</h1>

    <!-- Formulario para registrar pedido -->
    <form action="{{ route('pedido.store') }}" method="POST">
        <!-- proteccion de laravel para usar un formulario -->
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" class="form-control" name="platillo" placeholder="Platillo">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-align-left"></i></span>
            <input type="text" class="form-control" name="mesa" placeholder="Mesa">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-list"></i></span>        
            <input type="text" class="form-control" name="tipoPago" placeholder="Tipo de Pago">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="double" class="form-control" name="total" placeholder="Total">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon4"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="text" class="form-control" name="numeroPedido" placeholder="Número de Pedido">
        </div>
        
        <a href="{{ route('pedido.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver
        </a>
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Guardar
        


    </form>
    @endsection
</body>
</html>