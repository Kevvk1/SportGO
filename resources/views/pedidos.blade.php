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
                    <th scope="col">Productos del pedido</th>
                    <th scope="col">Modificar pedido</th>
                    <th scope="col">Eliminar pedido</th>
                </tr>
            </thead>

            <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <th scope="row">{{$pedido -> id_pedido}}</th>
                    <td>{{$pedido -> estado}}</td>
                    <td>{{$pedido -> fecha_creacion}}</td>
                    <td>{{$pedido -> fecha_ultima_actualizacion}}</td>

                    <td>
                        <button class='btn btn-success' id='boton_ver_productos' name='boton_ver_productos' onclick='VerProductos("{{$pedido->id_pedido}}")'>
                            <h6>Ver</h6>
                        </button>
                    </td>

                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="48" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" onclick="" style="border-radius: 10px; background-color: #d9db26;">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </td>

                    <td>
                        <form id="deletePedido-form" action="{{ route('pedido.eliminar') }}" method="POST">
                            @csrf
                            <!-- Campo oculto para código del producto -->
                            <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
                            <button type="submit" class="btn" style="border-radius: 10px; background-color: lightcoral;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>

                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection