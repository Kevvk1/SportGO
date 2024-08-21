@extends('layouts.base')

@section('title', 'SportGO - Carrito')

@section('main')
<div class="container">

    <div class="container mt-4" style="border: 1px solid gray; border-radius: 25px;">
        <h4 style="padding: .3em;">Carrito</h4>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mt-4">
                <div class="container overflow-y-auto" style="border:1px solid gray ; border-radius: 15px; height: 15em;">
                    @if(!$carrito)
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart mt-4" viewBox="0 0 16 16" style="color:gray; cursor:pointer;" id="buyCart-icon">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <h4>¡Empezá tu carrito de compras!</h4>
                        <button type="submit" class="btn" style="border-radius: 10px; background-color: #d9db26;">Buscar Productos</button>
                    @else
                        @foreach($carrito["carrito"]["productos"] as $producto)
                            <div class="row">
                                <div class="col-6">

                                    <div class="row">
                                        <div class="col-12">
                                            <h3>{{ $producto['nombre'] }}</h3>
                                        </div>      
                                    </div>

                                    <div class="row">
                                        <div class="col-12">                                 
                                            <div class="container-fluid" style="display: flex;">                                                       
                                                <div class="row">                                            

                                                    <div class="col-6 d-flex">   
                                                        <h5>Cantidad:</h5>                      
                                                        <p id="cantidad" class="ms-2">{{ $producto['cantidad'] }}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-3 align-self-center">
                                    <h3>${{ $producto['precio_unitario'] }}</h3>
                                </div>
                            </div>
                            @endforeach
                    @endif


                </div>
            </div> 
            <div class="col-4 mt-1">
                <div class="mt-4" style="border:1px solid gray ; border-radius: 15px;">
                    <h5 class="mt-2">Resumen de compra</h5>
                    <hr class="border border-secondary mt-0">
                    @if(!$carrito)
                        <p>Aqui veras los importes de tu compra una vez que agregues productos</p>
                    @else
                        @foreach($carrito["carrito"]["productos"] as $producto)
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>{{ $producto['nombre'] }}</p>
                                        </div>      
                                    </div>
                                    <div class="row">
                                        <div class="col-12">                                 
                                            <div class="container-fluid" style="display: flex;">                                                       
                                                <div class="row">                                            
                                                    <div class="col-6">                         
                                                        <p id="cantidad">Cantidad: {{ $producto['cantidad'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 align-self-center">
                                    <h3>${{ $producto['precio_total'] }}</h3>
                                </div>
                            </div>
                        @endforeach
                        <hr class="border border-secondary mt-0">
                        <h5 class="mt-2">Total a pagar: ${{ $carrito["carrito"]["total_a_pagar"] }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($carrito && session('user'))
        <div class="row">
            <div class="container mt-3 text-end">
                <button class="btn" style="border-radius: 10px; background-color: #d9db26;" onclick='location.href="/checkout"'>FINALIZAR COMPRA</button>
            </div>
        </div>
    @else

        <div class="row">
            <div class="container mt-3 text-end">
                <h5>Inicie sesión para poder continuar</h5>
                <button class="btn disabled" style="border-radius: 10px; background-color: #d9db26;">FINALIZAR COMPRA</button>
            </div>
        </div>
        
    @endif

        <div class="row">
            <div class="container mt-3 text-end">
                <button class="btn" style="border-radius: 10px; background-color: lightcoral;" onclick="document.getElementById('deleteCart-form').submit(); return false;">ELIMINAR CARRITO</button>
            </div>
        </div>
    
    <form id="deleteCart-form" action="{{ route('eliminar.carrito') }}" method="POST">
        @csrf
    </form>
</div>
@endsection