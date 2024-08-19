
@extends('layouts.base')

@section('title', "SportGO - Inicio")

@section('main')
    @if(session('success'))
        <h2 style="text-align: center;">{{ session('success') }}</h2>
    @elseif(session('email_verification_message'))
        <h2 style="text-align: center;">{{ session('email_verification_message') }}</h2>
    @endif

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 style="text-align: center;">Listado de productos</h1>
                </div>
                @if($productos->isEmpty())
                    <p>No hay productos disponibles.</p>
                @else
                <div class="table-responsive mt-5">
        <table class="table">
            <thead>
                <tr style="background-color: #d9db26 !important;">
                        <th scope="col">Codigo producto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Cantidad en Stock</th>
                        <th scope="col">Creada</th>
                        <th scope="col">Ultima actualizacion</th>
                        <th scope="col">Modificar producto</th>
                        <th scope="col">Eliminar producto</th>
                </tr>
            </thead>

            <tbody>
                @foreach($productos as $producto)  
                <tr>
                    <th scope="row">{{$producto -> codigo_producto}}</th>
                    <td>{{$producto -> nombre}}</td>
                    <td>{{$producto -> descripcion}}</td>
                    <td>{{$producto -> precio}}</td>
                    <td>{{ $producto -> stock_disponible > 0 ? 'Sí' : 'No' }}</td>
                    <td>{{$producto -> stock_disponible > 0 ? $producto -> stock_disponible : '0' }}</td>
                    <td>{{$producto -> created_at }}</td>
                    <td>{{$producto -> updated_at }}</td>

                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="48" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" onclick="ModificarProducto('{{ $producto->codigo_producto }}')" style="border-radius: 10px; background-color: #d9db26;">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </td>

                    <td>
                        <form id="deleteProduct-form" action="{{ route('producto.eliminar') }}" method="POST">
                            @csrf
                            <!-- Campo oculto para código del producto -->
                            <input type="hidden" name="codigo_producto" value="{{ $producto->codigo_producto }}">
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
            </div>
        </div>
    </section>
@endsection



