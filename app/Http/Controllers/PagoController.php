<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Exceptions\MPApiException;
use Illuminate\Support\Facades\Log;

class PagoController extends Controller
{
    //

    public function pay(Request $request){

        MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

        $client = new PaymentClient();

        
        $request_options = new RequestOptions();
        $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);

        $validatedData = $request->validate([
            'transaction_amount' => 'required|numeric',
            'token' => 'required|string',
            'description' => 'required|string',
            'installments' => 'required|integer',
            'payment_method_id' => 'required|string',
            'issuer_id' => 'required|integer',
            'payer.email' => 'required|email',
            'payer.identification.type' => 'required|string',
            'payer.identification.number' => 'required|string',
        ]);

        try {
            $payment = $client->create([
                "transaction_amount" => (float) $validatedData['transaction_amount'],
                "token" => $validatedData['token'],
                "description" => $validatedData['description'],
                "installments" => $validatedData['installments'],
                "payment_method_id" => $validatedData['payment_method_id'],
                "issuer_id" => $validatedData['issuer_id'],
                "payer" => [
                    "email" => $validatedData['payer']['email'],
                    "identification" => [
                        "type" => $validatedData['payer']['identification']['type'],
                        "number" => $validatedData['payer']['identification']['number']
                    ]
                ]
            ], $request_options);


            return response()->json($payment);

        } catch (\Exception $e) {
            dd($e);
        }

    }
}
