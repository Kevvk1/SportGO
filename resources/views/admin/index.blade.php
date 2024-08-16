@extends('layouts.base')

@section('title', 'SportGO - Panel de administrador')

@section('main')
    <h1 style="text-align: center;">Panel de administrador</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center my-5">
                <button type="button" class="btn btn-primary">Cargar producto</button>
                <button type="button" class="btn btn-primary">Consultar listado de productos</button>
                <button type="button" class="btn btn-primary">Ver pedidos pendientes</button>
                <button type="button" class="btn btn-primary">Entregar pedidos</button>
                <button type="button" class="btn btn-primary">Ver estado de cuenta</button>
            </div>
        </div>
    </div>
@endsection

   