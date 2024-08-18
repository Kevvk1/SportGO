@extends('layouts.base')

@section('title', 'SportGO - Iniciar sesión')

@section('main')
    <div class="container-fluid">
        
        @if(session('success'))
           <h2 style="text-align: center;">{{ session('success') }}</h2>
        @elseif(session('email_verification_message'))
            <h2 style="text-align: center;">{{ session('email_verification_message') }}</h2>
        @endif

        <form class="form-login" method="POST" action="{{ route('process.user') }}">
            @csrf
            <div class="row align-items-center" id="loginform">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">Iniciar sesión</h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12" id="cuilcontainer">
                            <label for="email" id="labelcuil" class="form-label">Correo electrónico</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com" aria-label="email" required>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-12" id="passwordcontainer">
                            <label for="password" id="labelpassword" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" aria-label="password" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <div id="recordarmediv">
                                <label for="recordarme" class="form-label">
                                    <input type="checkbox" id="recordarme" name="recordarme" value="Recordarme">
                                    Recordarme
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div id="forgotpass">
                                <p>¿Olvidaste tu contraseña?</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="submit" class="btn" id="loginbutton" value="login" name="action"> 
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