<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Exceptions\MPApiException;
use Illuminate\Support\Facades\Log;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Resources\Preference;

class MercadoPagoController extends Controller
{

    public function pay(Request $request){

        MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

        $preference = $this->createPaymentPreference();

        if($preference){
            return view('pagopro', ['preference' => $preference]);
        }
        else{
            return view('error');
        }

    }

        // Function that will return a request object to be sent to Mercado Pago API
    public function createPreferenceRequest($items, $payer): array
    {
        $paymentMethods = [
            "excluded_payment_methods" => [],
            "installments" => 12,
            "default_installments" => 1
        ];

        $backUrls = array(
            'success' => route('mercadopago.success'),
            'failure' => route('mercadopago.failed'),
            'pending' => route('mercadopago.pending')
        );

        $request = [
            "items" => $items,
            "payer" => $payer,
            "payment_methods" => $paymentMethods,
            "back_urls" => $backUrls,
            "statement_descriptor" => "SportGO",
            "external_reference" => "1234567890",
            "expires" => false,
            "auto_return" => 'approved',
        ];

        return $request;
    }

    public function createPaymentPreference(): ?Preference
    {

        //Obtengo carrito de la sesion
        $carrito = session()->get('carrito', ['carrito' => ['productos' => [], 'total_a_pagar' => 0]]);

        $productos = $carrito["carrito"]["productos"];

        $items = [];

        foreach ($productos as $producto){
            $items[] = [ 
                "id" => $producto["codigo"],
                "title" => $producto["nombre"],
                "description" => $producto["nombre"] ?? 'Descripción del producto',
                "quantity" => (int) $producto["cantidad"],
                "unit_price" => (float) $producto["precio_unitario"],
                "currency_id" => "ARS"
            ];
        }
        

        // Retrieve information about the user (use your own function)
        $user = session('user');


        $comprador = array(
            "name" => $user->nombres,
            "surname" => $user->apellidos,
            "email" => $user->email,
        );

        // Create the request object to be sent to the API when the preference is created
        $request = $this->createPreferenceRequest($items, $comprador);


        // Instantiate a new Preference Client
        $client = new PreferenceClient();

        try {
            // Send the request that will create the new preference for user's checkout flow
            $preference = $client->create($request);

            // Useful props you could use from this object is 'init_point' (URL to Checkout Pro) or the 'id'
            return $preference;
        } catch (MPApiException $error) {
            // Here you might return whatever your app needs.
            // We are returning null here as an example.
            dd($error);
        }
    }

    public function success(){
        session()->flash('success', 'OK');
        return view('finished');
    }

    public function failure(){
        session()->flash('failure', 'NO');
        return view('finished');
    }

    public function pending(){
        session()->flash('pending', 'NO');
        return view('finished');
    }
}
