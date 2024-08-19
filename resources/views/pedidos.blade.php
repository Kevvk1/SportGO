@extends('layouts.base')

@section('title', 'SportGO - Mis pedidos')

@section('main')
<h1 class="mt-3 text-center">Mis pedidos</h1>
    @if($pedidos->isEmpty())
        <p>No hay pedidos registrados</p>
    @else
    <div class="table-responsive mt-5">
        <table class="table text-center table-striped-columns table-bordered">
            <thead>
                <tr style="background-color: #d9db26 !important;">
                        <th scope="col">ID_Pedido</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Ultima actualizacion</th>
                        <th scope="col">Productos del pedido</th>
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

    <div class="modal fade" id="ver-productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f1f1f1; border-radius: 15px;">
                <div class="modal-body">
                    <h4 class="text-center">Productos del pedido</h4>
                    <ul id="listado_productos_modal" class="list-unstyled" style="list-style-type: none;"></ul>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin.pedidos.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @endif
@endsection