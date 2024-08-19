@extends('layouts.base')

@section('title', 'SportGO - Finalizar compra')

@section('main')

    <div class="container-fluid">
        
        @if(session('success'))
           <h2 style="text-align: center;">{{ session('success') }}</h2>
        @elseif(session('email_verification_message'))
            <h2 style="text-align: center;">{{ session('email_verification_message') }}</h2>
        @endif

        <div class="container mt-2" style="border: 1px solid gray; border-radius:1rem;">

            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>

            <span class="fs-4 ms-2">Continuar compra</span>

        </div>


        <div class="container mt-2 p-4" style="border: 1px solid gray; border-radius:1rem;">

            <form class="form-checkout" method="POST" action="{{ route('pedido.crear') }}">

                <div class="row ms-5">


                    <div class="col-7">

                        <div class="mb-3">

                            <input type="text" class="form-control" id="nombre_apellido" name="nombre_apellido" aria-describedby="nombre y apellido" placeholder="Nombre y apellido">

                        </div>

                        <div class="mb-3">

                            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" aria-describedby="Codigo postal" placeholder="Codigo postal">

                        </div>


                        <div class="row mb-3">

                            <div class="col-6">

                                <input type="text" class="form-control" id="provincia" name="provincia" aria-describedby="provincia" placeholder="provincia">

                            </div>

                            <div class="col-6">
                                
                                <input type="text" class="form-control" id="localidad" name="localidad" aria-describedby="provincia" placeholder="Localidad">

                            </div>

                        </div>


                        <div class="row mb-3">

                            <div class="col-6">

                                <input type="text" class="form-control" id="calle" name="cale" aria-describedby="calle" placeholder="Calle/avenida">

                            </div>

                            <div class="col-6">
                                
                                <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccion" placeholder="Direccion(numero)">

                            </div>

                        </div>


                        <div class="row mb-3">

                            <div class="col-6">

                                <input type="text" class="form-control" id="piso_departamento" name="piso_departamento" aria-describedby="piso/departamento" placeholder="Piso/departamento(opcional)">

                            </div>

                            <div class="col-6">
                                    
                                <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="Teléfono de contacto" placeholder="Teléfono de contacto">

                            </div>

                        </div>

                        <div class="mb-3">

                            <label for="indicaciones">Indicaciones adicionales de esta dirrecion (opcional)</label>
                            <input type="text" class="form-control" id="indicaciones" name="indicaciones" aria-describedby="Indicaciones adicionales" placeholder="Descripción de la fachada, puntos de referencia para encontrarla, indicaciones de seguridad, etc...">

                        </div>


                    </div>

                    <div class="col-4 offset-1 mt-2">

                        <div class="row">

                            <div class="col-12">

                                <div class="container-fluid mb-3" style="border:1px solid gray; border-radius:1rem;">

                                    <span class="fs-4 ms-2">Detalles de compra</span>

                                </div>


                            </div>

                        </div>
                        

                        <div class="row">

                            <div class="col-12">

                                <div class="container-fluid mb-3" style="border:1px solid gray; border-radius:1rem;">

                                <p>Pelota de futbol Reebok Zig Gen N°5 Recreativa</p>


                                <div class="row">

                                    <div class="col-2 mb-3 offset-2 text-center" style="background-color: #d9db26; border: 1px solid yellow; border-radius:3rem;">

                                        <p>1</p>

                                    </div>

                                    <div class="col-7 offset-1 mt-2">

                                        <p>$80.000</p>

                                    </div>

                                </div>

                            </div>


                            </div>

                        </div>
                        


                        <div class="row">


                            <div class="col-12">


                                <div class="container-fluid d-flex" style="border: 1px solid gray; border-radius:1rem;">

                                    <p>TOTAL:</p>

                                    <p>$80.000</p>

                                </div>


                            </div>


                        </div>

                        
                        <div class="row">

                            <div class="col-12">

                                <div class="container-fluid">

                                    <button type="submit" class="btn p-2 mt-5" style="background-color: #d9db26; width:100%">

                                        <span>Continuar</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                        </svg>

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                
            </form>

        </div>


    </div>
@endsection