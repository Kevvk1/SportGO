
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
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/plw1t3qwNuHW7VwNqkav3w9Ov7CzqYBAXLxt3Ps0.webp') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Botella Everlast 109244 roja 800mL</h4>
                                                    <p class="card-text">$30.500</p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/rIkMQKiux5AcajUbF2wv6ilaUl38KYMpQxgAELSD.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Aros Ula Ula 50cm Entrenamiento Gimnasia x10u</h4>
                                                <p class="card-text">$2.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/Me6rXCc6CuQU7Jr0IonprxDEyuyTeuR1qh6Kf4Vd.webp') }}">
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
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/B9sbmrLOoJ1mNhNILSC9LOrk31BFV6CJ1QU6WyBU.jpg') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Soga De Saltar Pvc Ajustable 2.5 Metros</h4>
                                                <p class="card-text">$5.000</p>
                                            </div>                   
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/tNSyNR7S21Y8O8OibgT5xnX88ZVGehYwX9wCIjcK.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Pelota Basquet Evolution N°5</h4>
                                                <p class="card-text">$95.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/CsXGTqoQbdzvplgLDABkFhNVB4ZazHywjr3XkVdA.webp') }}">
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
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/1I2OXcVyA9pAuV8xvyoxwNRCxBpJv7ftrfp9EuXa.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Escalera de coordinacion</h4>
                                                <p class="card-text ">$13.000</p>
                                            </div>                  
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/11zGbRejjP5Egi2dgnBFoq87RKFuelQOR0fgdJ0u.webp') }}">
                                            <div class="card-body">
                                                <h4 class="card-title">Pelota handball Pvc Pulpo x10u</h4>
                                                <p class="card-text">$15.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('storage/img/productos/ebDF8t4YPZKGkfnSUgwyxYxPmUEH09yVnzy0EjfZ.webp') }}">
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



