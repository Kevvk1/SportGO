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

                        <!-- Campo oculto para código del producto -->
                        <input type="hidden" name="codigo_producto" value="{{ $producto->codigo_producto }}">
                        <!-- Campo oculto para nombre del producto -->
                        <input type="hidden" name="nombre_producto" value="{{ $producto->nombre }}">
                        <!-- Campo oculto para precio del producto -->
                        <input type="hidden" name="precio_producto" value="{{ $producto->precio }}">
                        <!-- Campo oculto para imagen del producto -->
                        <input type="hidden" name="imagen_producto" value="{{ $producto->imagen }}">
                        <!-- Campo oculto para stock del producto -->
                        <input type="hidden" name="stock_producto" value="{{ $producto->stock_disponible }}">

                        <button class="btn" id="boton-modificar-producto" style="border-radius: 10px; background-color: yellow;" onclick="ModificarProducto( {{ $producto->codigo_producto }} )">Modificar</button>
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


    <div class="modal fade" id="editar-producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #f1f1f1; border-radius: 15px;">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h4 class="text-center">Editar producto</h4>

                        <form id="modifyProduct-form" action="{{ route('producto.modificar') }}" method="POST">
                            @csrf
                            <div class="container">
                                <div class="row">

                                    <form id="modifyProduct-form" action="{{ route('producto.modificar') }}" method="POST">
                                        @csrf
                                        <div class="col-4">
                                            <img src="" class="img-fluid" id="imagen_producto_modal" name="imagen_producto_modal" style="height: 20em; width: 15em;">
                                        </div>
                                        <div class="col-8">
                                            <div class="d-block">
                                                <label for="nombre_producto_modal">Nombre</label>
                                                <input type="text" style="border: 1px solid white; border-radius: 15px; background-color: white;" name="nombre_producto_modal" id="nombre_producto_modal" class="p-1" value="None">
                                            </div>

                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="d-inlineblock">
                                                        <label for="precio_producto_modal">Precio</label>
                                                        <input type="text" style="border: 1px solid white; border-radius: 15px; background-color: white;" name="precio_producto_modal" id="precio_producto_modal" class="p-2" value="$2.000">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="d-inlineblock">
                                                        <label for="cantidad_producto_modal">Cantidad</label>                                                          
                                                        <input type="text" class="form-control" name="cantidad_producto_modal" id="cantidad_producto_modal" value="50" style="border-radius: 15px;">                                                                      
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="d-inlineblock">
                                                        <label for="codigo_producto_modal">Código de producto</label>
                                                        <input type="text" style="border: 1px solid white; border-radius: 15px; background-color: white;" name="codigo_producto_modal" id="codigo_producto_modal" class="p-2" value="0">
                                                    </div>
                                                </div>

                                                <div class="col-6 offset-2 mt-5 d-inlineblock">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="black" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16"> 
                                                            <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
                                                    </svg>
                                                    <span>Reinicar cambios</span>
                                                </div>
                                            </div>                                                                                       
                                        </div>
                                    
                                    

                                    <div class="row">
                                        <div class="col-12 d-inlineblock mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                            <span>Eliminar producto</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
            

                            <div class="container-fluid text-center mt-3 mb-3">
                                <button class="btn" type="submit" style="background-color: #d9db26; width: 25%; border-radius: 15px;">Guardar</button>
                            </div>

                        </form>
                        
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin.listado.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @endif
@endsection