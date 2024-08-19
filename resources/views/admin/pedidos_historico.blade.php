@extends('layouts.base')

@section('title', 'SportGO - Historial de pedidos')

@section('main')
<h1 class="mt-3 text-center">Listado historico de pedidos</h1>
    @if($pedidos->isEmpty())
        <p>No hay pedidos registrados</p>
    @else
    <div class="table-responsive mt-5">
        <table class="table text-center table-striped-columns table-bordered">
            <thead>
                <tr style="background-color: #d9db26 !important;">
                        <th scope="col">ID_Pedido</th>
                        <th scope="col">Estado</th>
                        <th scope="col">ID_Cliente</th>
                        <th scope="col">Nombre y apellido del cliente</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Ultima actualizacion</th>
                        <th scope="col">Productos del pedido</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <th scope="row">{{$pedido -> id_pedido}}</th>
                    <td>{{$pedido -> estado}}</td>
                    <td>{{$pedido -> cliente -> id_usuario}}</td>
                    <td>{{$pedido -> cliente -> nombres}} {{$pedido -> cliente -> apellidos}}</td>
                    <td>{{$pedido -> fecha_creacion}}</td>
                    <td>{{$pedido -> fecha_ultima_actualizacion}}</td>

                    <td>
                        <button class='btn btn-success' id='boton_ver_productos' name='boton_ver_productos' onclick='VerProductos("{{$pedido->id_pedido}}")'>
                            <h6>Ver</h6>
                        </button>
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