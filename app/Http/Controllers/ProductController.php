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


}
