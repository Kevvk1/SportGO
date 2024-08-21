@extends('layouts.base')

@section('title', 'SportGO - Panel de administrador')

@section('main')
    <h1 style="text-align: center;">Panel de administrador</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 justify-content-center my-5">
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/cargar'">Cargar producto</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/listado'">Consultar listado de productos</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/usuarios'">Consultar listado de usuarios</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/pedidos/pendientes'">Ver pedidos pendientes</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/pedidos/historico'">Ver historico de pedidos</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/admin/estadocuenta'">Ver estado de cuenta</button>
            </div>
        </div>
    </div>
@endsection

   