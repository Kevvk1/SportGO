<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Pedidos;

class VentasController extends Controller
{
    public function index(){
        $ventas = Ventas::all();
        return view('admin/estado_cuenta', compact('ventas'));
    }
}
