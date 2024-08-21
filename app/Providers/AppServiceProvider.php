<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verifica tu correo electrónico')
                ->greeting('Hola, '.$notifiable->nombres)
                ->line('Por seguridad, necesitamos confirmar que este es tu correo electrónico')
                ->line('Por favor, haz click en el botón debajo para confirmarlo y comenzar a utilizar nuestro sistema')
                ->action('Click aquí para verificar tu correo electrónico', $url)
                ->salutation('Saludos');
        });

    }
}
