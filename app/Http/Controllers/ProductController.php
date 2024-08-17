<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    
    public function index(){
        $productos = Productos::all();
        return view('productos', compact('productos'));
    }

    public function indexAdmin(){
        $productos = Productos::all();
        return view('admin/listado', compact('productos'));
    }

    public function cargar(Request $request){

        $validatedData = $request -> validate([
            'nombre_producto' => ['required', 'string', 'max:255'],
            'descripcion_producto' => ['required', 'string', 'max:255'],
            'precio_producto' => ['required', 'decimal:0,2'],
            'stock_producto' => ['required', 'numeric'],
            'codigo_producto' => ['required', 'numeric', 'unique:productos', 'max:255'],
            'imagen_producto' => ['required', 'max:2048', 'image', 'mimes:jpg,bmp,png,jpeg,webp'],
        ]);

        if($request->file('imagen_producto')->isValid()){
            $imagen_producto_path = $request->file('imagen_producto')->store('/public/img/productos');
        }

        $producto = Productos::create([
            'codigo_producto' => $request->codigo_producto,
            'nombre' => $request->nombre_producto,
            'descripcion' => $request->descripcion_producto,
            'precio' => $request->precio_producto,
            'imagen' => $imagen_producto_path,
            'stock_disponible' => $request->stock_producto,
        ]);

        $producto->save();

        return redirect()->route('admin.cargar')->withSuccess("Producto cargado exitosamente");

    }

    public function eliminar(Request $request){

        $codigo_producto = $request -> input('codigo_producto');

        $producto = Productos::find($codigo_producto);

        Log::info("A eliminar:");
        Log::emergency($producto);

        if($producto){
            $producto->delete();

            return redirect()->back()->with('success', 'Producto eliminado correctamente');
        }

        
    }

    
    public function addToCart(Request $request){

        $cantidad = 1;

        $codigo_producto = $request -> input('codigo_producto');

        //Obtiene json de informacion del producto de la base de datos
        $producto = Productos::find($codigo_producto);

        if(!$producto){
            return redirect()->back()->with('error', 'No se encontro el producto');
        }

        //Obtiene el carrito actual de la sesion
        $carrito = session()->get('carrito', []);

        //Ya existe el producto en el carrito actual?
        $existe = array_key_exists("producto_".$codigo_producto, $carrito);

        //Si existe, le sumo 1 de cantidad
        if($existe){
            
            $producto = $carrito["producto_".$codigo_producto];

            $producto["cantidad"]+=1;

            $carrito["producto_".$codigo_producto] = $producto;

            session(['carrito' => $carrito]);
            
        }
        //Sino, agrego el item al carrito
        else{
            //Crea array con el producto, actua de carrito
            $carrito["producto_".$codigo_producto] = [
                'codigo' => $producto->codigo_producto,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
                'imagen'=> $producto->imagen
            ];

            session()->put('carrito', $carrito);

        }

        
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }


    public function getCurrentCart(Request $request){

        $carrito = session('carrito', []);

        return view('carrito')->with('carrito', $carrito);
    }

    public function deleteCurrentCart(Request $request){

        $carrito = session('carrito', []);

        $carrito = session()->forget('carrito');

        return view('carrito')->with('carrito', $carrito);
    }


}
