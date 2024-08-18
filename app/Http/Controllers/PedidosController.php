<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;


class PedidosController extends Controller
{
    public function indexAdmin(){
        $pedidos = Pedidos::all();
        return view('admin/pedidos', compact('pedidos'));
    }

}
