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
        return view('index', compact('productos'));
    }

    
    public function indexAdmin(){
        $productos = Productos::all();
        return view('admin/listado', compact('productos'));
    }


    public function getProducto($codigo_producto){
        $producto = Productos::find($codigo_producto);

        if(!$producto){
            return response()->json([
                'error' => 'No se encontro el producto'
            ], 404);
        }
        else{
            return response()->json([$producto]);
        }
    }


    public function modificar(Request $request){

        //Agregar validaciones de datos


        $codigo_producto = $request -> input('codigo_producto_modal');

        $producto = Productos::find($codigo_producto);


        if(!$producto){
            return redirect()->back()->with('error', 'No se encontro el producto');
        }

        $producto->codigo_producto = $request->codigo_producto_modal;
        $producto->nombre = $request->nombre_producto_modal;
        $producto->precio = $request->precio_producto_modal;
        $producto->stock_disponible = $request->cantidad_producto_modal;

        $producto -> save();

        return redirect()->back()->with('success', 'Producto modificado exitosamente');
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

        if($producto){
            $producto->delete();

            return redirect()->back()->with('success', 'Producto eliminado correctamente');
        } 
    }

    
    public function verifyCart(Request $request){
        $codigo_producto = $request -> input('codigo_producto');

        $producto = Productos::find($codigo_producto);

        if(!$producto){
            return redirect()->back()->with('error', 'No se encontro el producto');
        }

        //Obtiene el carrito actual de la sesion
        $carrito = session()->get('carrito', ['carrito' => ['productos' => [], 'total_a_pagar' => 0]]);

        //Ya existe el producto en el carrito actual?
        $existe = array_key_exists("producto_".$codigo_producto, $carrito["carrito"]["productos"]);

        //Si existe, modifica la cantidad y le suma uno
        if($existe){
                        
            $producto = $carrito["carrito"]["productos"]["producto_".$codigo_producto];

            $producto["cantidad"]+=1;

            $producto["precio_total"] = $producto["precio_unitario"] * $producto["cantidad"];

            $carrito["carrito"]["productos"]["producto_".$codigo_producto] = $producto;

            session(['carrito' => $carrito]);
        }
        //Sino, llama a la funcion para agregarlo al carrito
        else{
            return $this->addToCart($request);
        }

        return redirect()->back()->with('success', 'Producto agregado al carrito');
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
        $carrito = session()->get('carrito', ['carrito' => ['productos' => [], 'total_a_pagar' => 0]]);

        //Crea array con el producto
        $carrito["carrito"]["productos"]["producto_".$codigo_producto] = [
            'codigo' => $producto->codigo_producto,
            'nombre' => $producto->nombre,
            'precio_unitario' => $producto->precio,
            'precio_total' => ($cantidad*($producto->precio)),
            'cantidad' => $cantidad,
            'imagen'=> $producto->imagen
        ];

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }


    public function getCurrentCart(Request $request){

        $total = 0;

        //Carrito actual
        $carrito = session()->get('carrito', ['carrito' => ['productos' => [], 'total_a_pagar' => 0]]);

        if(count($carrito["carrito"]["productos"])!=0){

            //Recorrido sobre los productos para sumar el precio total de cada uno
            foreach($carrito["carrito"]["productos"] as $producto){
                $total += $producto["precio_total"];
            }

            //Actualizo total a pagar
            $carrito["carrito"]["total_a_pagar"] = $total;

            //Pusheo carrito actualizado a la sesion
            session(['carrito' => $carrito]);

            return view('carrito')->with('carrito', $carrito);
        }
        else{
            return view('carrito')->with('carrito'); //Devuelvo la variable carrito vacia
        }  
    }


    public function deleteCurrentCart(Request $request){

        $carrito = session('carrito', []);

        $carrito = session()->forget('carrito');

        return view('carrito')->with('carrito', $carrito);
    }


}
