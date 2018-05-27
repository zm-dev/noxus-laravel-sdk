<?php

namespace ZMDev\NoxusSDK;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/noxus.php' => config_path('noxus.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton(AppClient::class, function () {
            return new AppClient(config('noxus.rpc_hostname'), config('noxus.rpc_timeout'));
        });
    }
}
