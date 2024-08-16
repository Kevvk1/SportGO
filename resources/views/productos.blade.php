@extends('layouts.base')

@section('title', 'SportGO - Productos')

@section('main')
    @if($productos->isEmpty())
        <p>No hay productos disponibles.</p>
    @else
    <div class="container text-center" style="margin-top: 1em;">
        <div class="row row-cols-3">
            @foreach($productos as $producto)
                <div class="">
                    <div class="list-group-item d-flex">
                        <div class="card text-center">
                            <img class="rounded mx-auto d-block img-producto" src="{{ asset(Storage::url($producto->imagen)) }}" style="height: 30%; width: 25%;">
                            <h4 class="card-title">{{ $producto->nombre }}</h4>
                            <h5 class="card-text">${{ $producto->precio }}</h5>
                            <button class="btn btn-white" data-id="{{ $producto->codigo_producto }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" style="color:black;">                     
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>  
    </div>
    @endif
@endsection

