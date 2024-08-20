
@extends('layouts.base')

@section('title', "SportGO - Inicio")

@section('main')
    @if(session('success'))
        <h2 style="text-align: center;">{{ session('success') }}</h2>
    @elseif(session('email_verification_message'))
        <h2 style="text-align: center;">{{ session('email_verification_message') }}</h2>
    @endif

    <h1 class="mt-3 text-center">Listado de productos publicados</h1>
    @if($productos->isEmpty())
        
        <div class="container-fluid text-center mt-5">
            <p class="fs-5">No hay productos disponibles en este momento</p>
        </div>
        
    @else
    <div class="table-responsive mt-5 me-3 ms-3 ">
        <table class="table table-striped-columns table-bordered  text-center w-100" style="border-radius:3rem;">
            <thead>
                <tr style="background-color: #d9db26 !important;">
                        <th scope="col">Codigo producto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Agregar al carrito</th>
                </tr>
            </thead>

            <tbody>
                @foreach($productos as $producto)  
                <tr>
                    <th scope="row">{{$producto -> codigo_producto}}</th>
                    <td>{{$producto -> nombre}}</td>
                    <td>{{$producto -> descripcion}}</td>
                    <td>${{$producto -> precio}}</td>

                    <td>
                        <form id="addToCart-form" action="{{ route('añadir.al.carrito') }}" method="POST">
                            @csrf
                            <!-- Campo oculto para código del producto -->
                            <input type="hidden" name="codigo_producto" value="{{ $producto->codigo_producto }}">
                            <!-- Campo oculto para nombre del producto -->
                            <input type="hidden" name="nombre_producto" value="{{ $producto->nombre }}">
                            <!-- Campo oculto para precio del producto -->
                            <input type="hidden" name="precio_producto" value="{{ $producto->precio }}">
                            <!-- Campo oculto para imagen del producto -->
                            <input type="hidden" name="imagen_producto" value="{{ $producto->imagen }}">

                            <button class="btn btn-white" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" style="color:black;">                     
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                </svg>
                            </button>
                                
                        </form>
                    </td>
                    
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>



    <script src="{{ asset('js/admin.listado.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @endif
@endsection



