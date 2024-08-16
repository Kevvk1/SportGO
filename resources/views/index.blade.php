
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
                <div class="col-6">
                    <h3 class="mb-3">Productos destacados</h3>
                </div>

                <div class="col-6 text-right">
                    <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>

                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/BotellaEverlas10924.webp') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Botella Everlast 109244 roja 800mL</h4>
                                                    <p class="card-text">$30.500</p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/ArosHula70cmPack10.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Aros Ula Ula 50cm Entrenamiento Gimnasia x10u</h4>
                                                <p class="card-text">$2.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/PelotaFútbolReebokZig.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Pelota Fútbol Reebok Zig Gen N° 5 Recreativa</h4>
                                                <p class="card-text">$80.000</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/SogaSaltarPVC280m.jpg') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Soga De Saltar Pvc Ajustable 2.5 Metros</h4>
                                                <p class="card-text">$5.000</p>
                                            </div>                   
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/PelotaBasquetEvolutionNro5.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Pelota Basquet Evolution N°5</h4>
                                                <p class="card-text">$95.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/ConosTortugaPack10.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Conos tortuga x10u</h4>
                                                <p class="card-text">$10.000</p>
                                            </div>
                                        </div>
                                    </div>            
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/EscaleraCoordinacion.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Escalera de coordinacion</h4>
                                                <p class="card-text ">$13.000</p>
                                            </div>                  
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/PelotaHandballPvcPulpoPack10.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Pelota handball Pvc Pulpo x10u</h4>
                                                <p class="card-text">$15.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('img/productos/GuantesTopperLuva.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Guantes Topper Luva</h4>
                                                <p class="card-text">$50.000</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



