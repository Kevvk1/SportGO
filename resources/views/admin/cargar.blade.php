@extends('layouts.base')

@section('title', 'SportGO - Cargar productos')

@section('main')

    <div class="container">

        <form class="form-carga" method="POST" action="{{ route('producto.cargar') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-12 my-3">
                    <h2 style="text-align: center;">Cargar nuevo producto</h2>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="nombre_producto">Nombre</label>
                            <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Ingrese el nombre del producto" aria-label="Nombre del producto" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="descripcion_producto">Descripcion</label>
                            <input type="text" name="descripcion_producto" id="descripcion_producto" class="form-control" placeholder="Ingrese la descripción del producto" aria-label="Descripción del producto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="precio_producto">Precio unitario</label>
                            <input type="text" name="precio_producto" id="precio_producto" class="form-control" placeholder="Ingrese el precio del producto" aria-label="Precio del producto" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="stock_producto">Stock disponible (en unidades)</label>
                            <input type="text" name="stock_producto" id="stock_producto" class="form-control" aria-label="Stock del producto" placeholder="Ingrese el stock del producto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="codigo_producto">Código de producto</label>
                            <input type="text" name="codigo_producto" id="codigo_producto" class="form-control" placeholder="Ingrese el código de producto" aria-label="Código del producto" required>
                        </div>
                   
                        <div class="col-6 mt-4">
                                <label for="imagen_producto" class="form-label mb-0">Adjunte imagen del producto</label>
                                <input class="form-control" type="file" name="imagen_producto" id="imagen_producto" accept="image/*">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 text-center">
                            <span style="color: gray;">Todos los campos son obligatorios</span>
                        </div>
                    </div>
                    


                    <div class="row text-center">
                        <div class="col-12 p-2">
                            <button type="submit" class="btn btn-warning" id="loginbutton" value="cargar" name="action" style="background-color: #d9db26; border-radius: 15px;"> 
                                <h5 class="mt-1">Cargar</h5>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    
@endsection
