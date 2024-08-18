@extends('layouts.base')

@section('title', 'SportGO - Finalizar compra')

@section('main')
    <div class="container-fluid">
        
        @if(session('success'))
           <h2 style="text-align: center;">{{ session('success') }}</h2>
        @elseif(session('email_verification_message'))
            <h2 style="text-align: center;">{{ session('email_verification_message') }}</h2>
        @endif

        <form class="form-checkout" method="POST" action="{{ route('checkout') }}">
            @csrf
            
            <button type="submit" class="btn" id="loginbutton" value="login" name="action"> 
                <h5>Ingresar</h5>
            </button>
        </form>

    </div>
@endsection