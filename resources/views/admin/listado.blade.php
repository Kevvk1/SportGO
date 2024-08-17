@extends('layouts.base')

@section('title', 'SportGO - Listado de productos publicados')

@section('main')
    @if($productos->isEmpty())
        <p>No hay productos publicados.</p>
    @else
    <div class="container text-center" style="margin-top: 1em;">
        <div class="row">
            @foreach($productos as $producto)                    
                <div class="row" style="border: 1px solid gray; border-radius: 25px;">
                    
                    <div class="col-3">
                        <img src="{{ asset(Storage::url($producto['imagen'])) }}" class="img-fluid" style="height:80%; width:80%;"> 
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $producto['nombre'] }}</p>
                                <p>Stock disponible: {{ $producto['stock_disponible'] }} unidades</p>
                            </div>      
                        </div>
                    </div>

                    <div class="col-3 align-self-center">
                        <h3>${{ $producto['precio'] }}</h3>
                    </div>


                    <div class="col-6">
                        <button class="btn" style="border-radius: 10px; background-color: yellow;">Modificar</button>
                    </div>
                    
                    <div class="col-6">
                        <form id="deleteProduct-form" action="{{ route('producto.eliminar') }}" method="POST">
                            @csrf
                            <!-- Campo oculto para código del producto -->
                            <input type="hidden" name="codigo_producto" value="{{ $producto->codigo_producto }}">
                            <button type="submit" class="btn" style="border-radius: 10px; background-color: lightcoral;">Eliminar</button>
                        </form>
                    </div>
                    
                </div>

            @endforeach
        </div>  
    </div>

    @endif
@endsection