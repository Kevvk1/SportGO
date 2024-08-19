<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\User;
use App\Models\PedidosPendientes;
use App\Models\PedidosFinalizados;
use App\Models\Ventas;


class PedidosController extends Controller
{

    public function index(Request $request){

        $id_usuario = session()->get('user', [])->id_usuario;
        
        $pedidos = Pedidos::where('id_usuario', $id_usuario)->get();

        return view('pedidos', ['pedidos' => $pedidos]);
    }


    public function indexAdmin(Request $request){

        if($request->path()=="admin/pedidos/pendientes"){
            $pedidos = Pedidos::where('estado', "Pendiente de entrega")->get();
            return view('admin/pedidos', compact('pedidos'));
        }
        else if($request->path()=="admin/pedidos/historico"){
            $pedidos = Pedidos::where('estado', "Entregado")->get();
            return view('admin/pedidos_historico', compact('pedidos'));
        }

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

        //Creo el pedido tambien en pedidos_pendientes -conectado con claves foraneas-
        PedidosPendientes::create([
            'id_pedido' => $pedido->id_pedido,
            'id_usuario' => $pedido->id_usuario,
        ]);

        //Obtengo carrito de la sesion
        $carrito = session()->get('carrito', ['carrito' => ['productos' => [], 'total_a_pagar' => 0]]);

        //Recorro carrito y por cada producto lo agrego a la tabla itemsPedido
        foreach($carrito["carrito"]["productos"] as $producto){
            $pedido->productos()->attach($producto["codigo"], [
                'cantidad' => $producto["cantidad"]
            ]);
        }
        

        $validatedData = $request -> validate([
            'nombre_apellido' => ['required', 'max:255'],
            'calle' => ['required', 'max:255'],
            'altura' => ['required', 'numeric', 'max_digits:9'],
            'provincia' => ['required', 'max:255'],
            'localidad' => ['required', 'max:255'],
            'codigo_postal' => ['required', 'max:255'],
            'piso_departamento' => ['max:255', 'nullable'],
            'telefono' => ['required', 'max:255'],
            'indicaciones' => ['max:255', 'nullable'],
        ]);

        //Creo venta
        $venta = Ventas::create([
            'id_usuario' => $pedido->id_usuario,
            'id_pedido' => $pedido->id_pedido,
            'nombre_apellido' => ($request->input('nombre_apellido')),
            'calle_cliente' => ($request->input('calle')),
            'calle_altura_cliente' => ($request->input('altura')),
            'provincia' => ($request->input('provincia')),
            'localidad' => ($request->input('localidad')),
            'codigo_postal' => ($request->input('codigo_postal')),
            'piso_departamento' => ($request->input('piso_departamento')),
            'metodo_pago' => "MercadoPago",
            'telefono_contacto' => ($request->input('telefono')),
            'indicaciones_adicionales' => ($request->input('indicaciones')),
            'monto_total' => $carrito["carrito"]["total_a_pagar"],
        ]);


        return redirect()->route('checkout.pagar');
    }

    public function eliminar(Request $request){
        
        $id_pedido = $request -> input('id_pedido');

        $pedido = Pedidos::find($id_pedido);

        if($pedido){
            $pedido->delete();

            return redirect()->back()->with('success', 'Pedido eliminado correctamente');
        }
    }

    public function entregar(Request $request){

        $id_pedido = $request->input('id_pedido');

        $pedido = Pedidos::find($id_pedido);

        if(!$pedido){
            return redirect()->back()->with('error', 'No se encontro el pedido');
        }

        $pedido->estado = "Entregado";

        $pedido->save();


        $pedido_pendiente = PedidosPendientes::where('id_pedido', $id_pedido)->first();

        if (!$pedido_pendiente) {
            return response()->json([
                'error' => 'No se encontró el pedido en pedidos pendientes'
            ], 404);
        }

        //Creo el pedido en pedidos_finalizados -conectado con claves foraneas-
        PedidosFinalizados::create([
            'id_pedido' => $pedido->id_pedido,
            'id_usuario' => $pedido->id_usuario
        ]);

        //Elimino el pedido de pedidos_pendientes
        $pedido_pendiente -> delete();



        return redirect()->back()->with('success', 'Pedido entregado');
    }

    public function getProductosPedido($id_pedido){

        $user_type = session('user')->type;
        
        if($user_type != "admin"){
            //Busca el pedido donde el usuario que esta peticionando (id_usuario) sea igual al id_usuario que esta en id_pedido
            //Basicamente: si el pedido no es del usuario peticionando, no se lo muestra
            $pedido = Pedidos::where('id_usuario', session('user')->id_usuario)
                ->where('id_pedido', $id_pedido)
                ->first();
        }
        else if($user_type == "admin"){
            $pedido = Pedidos::where('id_pedido', $id_pedido) -> first();
        }

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
