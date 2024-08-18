@extends('layouts.base')

@section('title', 'SportGO - Iniciar sesión')

@section('main')
    <div class="container">
        
        @if(session('success'))
           <h2 style="text-align: center;">{{ session('success') }}</h2>
        @elseif(session('email_verification_message'))
            <h2 style="text-align: center;">{{ session('email_verification_message') }}</h2>
        @endif

        <form class="form-login" method="POST" action="{{ route('process.user') }}">
            @csrf
            <div class="row" id="loginform">
                <div class="col-lg-12 p-5">
                    <div class="row text-center">
                        <div class="col-12">
                            <h2 class="text-center">Iniciar sesión</h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12" id="cuilcontainer">
                            <label for="email" id="labelcuil" class="form-label">Correo electrónico</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com" aria-label="email" style="border-radius: 15px;" required>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-12" id="passwordcontainer">
                            <label for="password" id="labelpassword" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" aria-label="password" style="border-radius: 15px;" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-5">
                            <div id="recordarmediv">
                                <label for="recordarme" class="form-label">
                                    <input type="checkbox" id="recordarme" name="recordarme" value="Recordarme">
                                    Recordarme
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div id="forgotpass">
                                <a href="#">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn" id="loginbutton" value="login" name="action" style="background-color: #d9db26; width: 30%; border-radius: 15px;"> 
                                <h5>Ingresar</h5>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a id="registerbutton" href="/register"> 
                                ¿No tienes una cuenta? <u>Regístrate</u>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------- -->
            </div>
        </form>
    </main>
@endsection