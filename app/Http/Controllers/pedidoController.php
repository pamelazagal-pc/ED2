<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
class pedidoController extends Controller
{
    //Consultar a las pedido en la base de datos
    public function index()
    {
        $pedido = pedido::all();
        return view('pedido.index', compact('pedido'));
    }

    //Mostrar el formulario para crear una nueva pedido
    public function create()
    {
        return view('pedido.create');
        
    }


    //Guardar datos en la base de datos 
    public function store(Request $request)
    {
        pedido::create([
            'platillo' => $request->platillo,
            'mesa' => $request->mesa,
            'tipoPago' => $request->tipoPago,
            'numeroPedido' => $request->numeroPedido,
            'total' => $request->total,
        ]);

        return redirect()->route('pedido.create');
        
    }  

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * consultar informacion de un pedido en especifico
     */
    public function edit(pedido $pedido)
    {
        //enviar la informacion a la vista edit con los datos del pedido
        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pedido $pedido)
    {
        $request->validate([
            'platillo' => 'required',
            'mesa' => 'required',
            'tipoPago' => 'required',
            'total' => 'required',
            'numeroPedido' => 'required',
        ]);
        $pedido->update([
            'platillo' => $request->platillo,
            'mesa' => $request->mesa,
            'tipoPago' => $request->tipoPago,
            'total' => $request->total,
            'numeroPedido' => $request->numeroPedido,
        ]);

        //actualizar los datos del pedido
        $pedido->update($request->all());

        //redirigir al usuario a la pagina de pedido
        return redirect()->route('pedido.index') ->with('success', 'Actualizacion con exito :D');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pedido $pedido)
    {
        //eliminacion del registro del pedido
        $pedido->delete();

        //redireccionar al usuario a la pagina de pedidos
        return redirect()->route('pedido.index') ->with('success', 'pedido eliminada con exito :D');
    }

}
