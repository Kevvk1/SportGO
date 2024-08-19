@extends('layouts.base')

@section('title', 'SportGO - Pago')

@section('head')
    <script src="https://www.paypal.com/sdk/js?client-id={{config('app')['paypal_id']}}"></script>
@endsection

@section('main')
<div id="paypalButtons"></div>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units:[
                        {
                            amount: {
                                value:50
                            }
                        }
                    ]
                })
            },
            onApprove: function(data, actions){
                // TODO send order to server
                console.log(data.orderID)
                axios.post('paypal-process-order/'+data.orderID)
            }
        }).render("#paypalButtons");
    </script>
@endsection