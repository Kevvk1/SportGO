<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\User;


class PedidosController extends Controller
{
    public function indexAdmin(){
        $pedidos = Pedidos::all();
        return view('admin/pedidos', compact('pedidos'));
    }

    public function create(Request $request){



        $id_usuario = $request -> input('id_usuario');

        $usuario = User::find($id_usuario);

        $pedido = Pedidos::create([
            'estado' => "Sin entregar",
            'id_usuario' => $usuario->id_usuario,
        ]);

        $pedido->save();


        $carrito = session()->get('carrito', ['carrito' => ['productos' => [], 'total_a_pagar' => 0]]);


        foreach($carrito["carrito"]["productos"] as $producto){
            $pedido->productos()->attach($producto["codigo"], [
                'cantidad' => $producto["cantidad"]
            ]);
        }





        return redirect()->back()->withSuccess("Pedido registrado correctamente");
    }

}
