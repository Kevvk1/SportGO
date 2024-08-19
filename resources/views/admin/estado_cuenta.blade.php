@extends('layouts.base')

@section('title', 'SportGO - Estado de cuenta')

@section('main')
    <h1 class="mt-3 text-center">Estado de cuenta</h1>
    @if($ventas->isEmpty())
        <p>No hay ventas registradas</p>
    @else
    <div class="table-responsive mt-5">
        <table class="table text-center table-striped-columns table-bordered">
            <thead>
                <tr style="background-color: #d9db26 !important;">
                        <th scope="col">ID_Venta</th>
                        <th scope="col">ID_Cliente</th>
                        <th scope="col">ID_Pedido</th>
                        <th scope="col">Nombre y apellido del cliente</th>
                        <th scope="col">Domicilio del cliente</th>
                        <th scope="col">Piso / Departamento</th>
                        <th scope="col">Método de pago</th>
                        <th scope="col">Teléfono de contacto</th>
                        <th scope="col">Indicaciones adicionales</th>
                        <th scope="col">Monto total</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Fecha de última actualización</th>
                </tr>
            </thead>

            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <th scope="row">{{$venta -> id_venta}}</th>
                    <td>{{$venta -> cliente -> id_usuario}}</td>
                    <td>{{$venta -> pedido -> id_pedido}}</td>
                    <td>{{$venta -> nombre_apellido}}</td>
                    <td>{{$venta -> calle_cliente}} {{$venta -> calle_altura_cliente}} - {{$venta -> provincia}} - {{$venta -> localidad}} - Codigo Postal: {{$venta -> codigo_postal}}</td>
                    <td>{{$venta -> piso_departamento}}</td>
                    <td>{{$venta -> metodo_pago}}</td>
                    <td>{{$venta -> telefono_contacto}}</td>
                    <td>{{$venta -> indicaciones_adicionales}}</td>
                    <td>{{$venta -> monto_total}}</td>
                    <td>{{$venta -> fecha_creacion}}</td>
                    <td>{{$venta -> fecha_ultima_actualizacion}}</td>

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
    @endif
@endsection