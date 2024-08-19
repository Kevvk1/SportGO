@extends('layouts.base')

@section('title', 'SportGO - Pago')

@section('main')

<div class="container text-center" style="margin-top: 1em;">
    @if(session('success'))
        <h1 class="mt-3 text-center">¡Muchas gracias por tu pedido!</h1>
        <h2 class="mt-3 text-center">En breve podrás ver todos los detalles en la pestaña "Mis pedidos"</h1>
    @elseif(session('failure'))
        <h1 class="mt-3 text-center">Hubo un error al procesar tu pago</h1>
        <h2 class="mt-3 text-center">Lo sentimos! Por favor, vuelve a intentarlo</h1>
    @elseif(session('pending'))
        <h1 class="mt-3 text-center">Estamos procesando tu pago</h1>
        <h2 class="mt-3 text-center">En breve recibirás la confirmación</h1>
    @endif
</div>  
@endsection