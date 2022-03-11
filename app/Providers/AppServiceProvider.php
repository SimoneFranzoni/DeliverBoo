<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class,function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'mzrf87cggk6xs54b',
                    'publicKey' => 'wztjc6q47trzqymx',
                    'privateKey' => 'eb44d8ef28aed86c6489abc9fe8959c7'
                ]
                );
        });
    }
}
