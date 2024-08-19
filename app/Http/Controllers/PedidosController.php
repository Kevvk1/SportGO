<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\User;


class PedidosController extends Controller
{

    public function index(Request $request){

        $id_usuario = session()->get('user', [])->id_usuario;
        
        $pedidos = Pedidos::where('id_usuario', $id_usuario)->get();

        return view('pedidos', ['pedidos' => $pedidos]);
    }


    public function indexAdmin(){
        $pedidos = Pedidos::all();
        return view('admin/pedidos', compact('pedidos'));
    }

    public function create(Request $request){

        //Obtengo user de la sesion
        $id_usuario = session()->get('user', [])->id_usuario;

        $usuario = User::find($id_usuario);

        if(!$usuario){
            return redirect()->back()->with('error', 'Error al crear el pedido: no se encontro el usuario');
        }

        //Creo pedido
        $pedido = Pedidos::create([
            'estado' => "Pendiente de entrega",
            'id_usuario' => $usuario->id_usuario,
        ]);

        $pedido->save();

        //Obtengo carrito de la sesion
        $carrito = session()->get('carrito', ['carrito' => ['productos' => [], 'total_a_pagar' => 0]]);

        //Recorro carrito y por cada producto lo agrego a la tabla itemsPedido
        foreach($carrito["carrito"]["productos"] as $producto){
            $pedido->productos()->attach($producto["codigo"], [
                'cantidad' => $producto["cantidad"]
            ]);
        }


        return redirect()->back()->withSuccess("Pedido registrado correctamente");
    }

    public function eliminar(Request $request){
        
        $id_pedido = $request -> input('id_pedido');

        $pedido = Pedidos::find($id_pedido);

        if($pedido){
            $pedido->delete();

            return redirect()->back()->with('success', 'Pedido eliminado correctamente');
        }
    }

    public function getProductosPedido($id_pedido){
        $pedido = Pedidos::find($id_pedido);

        if(!$pedido){
            return response()->json([
                'error' => 'No se encontro el pedido'
            ], 404);
        }
        else{
            return response()->json([$pedido->productos]);
        }
    }

}
