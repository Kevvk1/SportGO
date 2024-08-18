@extends('layouts.base')

@section('title', 'SportGO - Listado de usuarios')

@section('main')
    <h1 class="mt-3 text-center">Listado de usuarios</h1>
    @if($usuarios->isEmpty())
        <p>No hay usuarios registrados</p>
    @else
    <div class="table-responsive mt-5">
        <table class="table">
            <thead>
                <tr style="background-color: #d9db26 !important;">
                        <th scope="col">ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Correo electronico</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Tipo de usuario</th>
                        <th scope="col">Cambiar tipo de usuario</th>
                </tr>
            </thead>

            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <th scope="row">{{$usuario -> id}}</th>
                    <td>{{$usuario -> nombres}}</td>
                    <td>{{$usuario -> apellidos}}</td>
                    <td>{{$usuario -> dni}}</td>
                    <td>{{$usuario -> email}}</td>
                    <td>{{$usuario -> fecha_nacimiento}}</td>
                    <td>{{$usuario -> sexo}}</td>
                    <td>{{$usuario -> type}}</td>
                    <td>
                        <form class="form-cambio-usuario" method="POST" action="{{ route('admin.cambiar.usuario') }}">
                            @csrf
                            @if($usuario -> type == 'user' )
                                <button type='submit' class='btn btn-danger' id='boton_tipo_usuario' name='boton_tipo_usuario' onclick=''>
                                    <h6>Convertir en administrador</h6>
                                </button>
                            @else
                                <button type='submit' class='btn btn-warning' id='boton_tipo_usuario' name='boton_tipo_usuario' onclick=''>
                                    <h6>Convertir en usuario</h6>
                                </button>
                            @endif
                            <!-- Campo oculto para id del usuario -->
                            <input type="hidden" name="id_usuario" value="{{ $usuario->id }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection