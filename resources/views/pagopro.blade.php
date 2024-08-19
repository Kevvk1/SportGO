@extends('layouts.base')

@section('title', 'SportGO - Pago')
@section('head')
<script src="https://sdk.mercadopago.com/js/v2"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('main')

<h1 class="mt-3 text-center">Ultimo paso: realizar pago</h1>
<div class="container-fluid text-align-center" id="wallet_container" style="width: 20%;"></div>

<script>
    const mp = new MercadoPago('APP_USR-f9f66983-2a3e-4639-8db4-518cd88c5b9e', {
        locale: "es-AR",
    });
    // Configura el widget de Mercado Pago Wallet
    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "{{ $preference->id }}", // Usa el ID de preferencia pasado desde el backend
        },
        customization: {
            texts: {
                valueProp: 'smart_option',
            },
        },
    });
</script>

@endsection