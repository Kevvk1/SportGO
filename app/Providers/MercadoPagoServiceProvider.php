<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;


class MercadoPagoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Registrar el cliente de MercadoPago en el contenedor de Laravel
        $this->app->singleton('mercadoPago', function ($app) {
            // Configurar SDK con el access token
            $mpAccessToken = env('MERCADOPAGO_ACCESS_TOKEN');
            MercadoPagoConfig::setAccessToken($mpAccessToken);
            MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

            return new PreferenceClient();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
