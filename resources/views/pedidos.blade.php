@extends('layouts.base')

@section('title', 'SportGO - Mis pedidos')

@section('main')
<h1 class="mt-3 text-center">Mis pedidos</h1>
    @if($pedidos->isEmpty())
        <p>No hay pedidos registrados</p>
    @else
    <div class="table-responsive mt-5">
        <table class="table">
            <thead>
                <tr style="background-color: #d9db26 !important;">
                        <th scope="col">ID_Pedido</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Ultima actualizacion</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <th scope="row">{{$pedido -> id_pedido}}</th>
                    <td>{{$pedido -> estado}}</td>
                    <td>{{$pedido -> fecha_creacion}}</td>
                    <td>{{$pedido -> fecha_ultima_actualizacion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection