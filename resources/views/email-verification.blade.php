@extends('layouts.base')

@section('title', 'SportGO - Verificación de correo requerida')


@section('main')
    <div class="container-fluid">
    
        <div class="row">

            <div class="col-4">
                <img src="{{ asset('img/sportgoblack.png') }}" class="img-fluid mx-auto" alt="Logo SportGO" style="width: 30%;">
            </div>

            <div class="col-8 d-flex justify-content-end my-5">
                <form id="logout-form" action="{{ route('logout.user') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn" id="logoutbutton">Cerrar sesión</button>
                </form>
            </div>

            <div class="col-12 text-center my-3" id="userbox">
                <div id="userinfo">
                    @if(session('user'))
                    <h4>{{session('user')->nombres}} {{session('user')->apellidos}}</h4>
                    @endif
                </div>
            </div>

            <div class="col-12 text-center">
                <h1>Verificate</h1>
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn" id="logoutbutton">Reenviar correo de verificación</button>
                </form>
                
                @if(session('success'))
                <h2>{{session('success')}}</h2>
                @endif
            </div>

        </div>

    </div>
@endsection




