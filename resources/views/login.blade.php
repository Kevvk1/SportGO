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
                            <a id="registerbutton" href="#" onclick="loginWindow('registerbutton'); return false;"> 
                                ¿No tienes una cuenta? <u>Regístrate</u>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------- -->
            </div>
        </form>


        @if(session('success'))
           <h2 style="text-align: center;">{{ session('success') }}</h2>
        @elseif(session('email_verification_message'))
            <h2 style="text-align: center;">{{ session('email_verification_message') }}</h2>
        @endif

        <form class="form-register" method="POST" action="{{ route('process.user') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-12 my-3">
                    <h2 style="text-align: center;">Crear cuenta</h2>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Ingrese sus nombres" aria-label="Nombres" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Ingrese sus apellidos" aria-label="apellidos" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="dni">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control" placeholder="Ingrese su DNI" aria-label="DNI" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="fechanacimiento">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" aria-label="fechanacimiento" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="correo">Correo electrónico</label>
                            <input type="text" name="email" id="correo_electronico" class="form-control" placeholder="Ingrese su correo electrónico" aria-label="correo" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="sexo">Sexo</label>
                            <select id="sexo" name="sexo" class="form-select" aria-label="Selección de sexo">
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="equis">X</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" aria-label="Contraseña" required>
                        </div>
                        <div class="col-lg-6 col-sm-12 my-4">
                            <label for="password">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ingrese su contraseña nuevamente" aria-label="Contraseña" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <span style="color: gray;">Todos los campos son obligatorios</span>
                        </div>
                    </div>
                    


                    <div class="row">
                        <div class="col-12 my-5">
                            <button type="submit" class="btn" id="loginbutton" value="register" name="action"> 
                                <h5>Registrarme</h5>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection