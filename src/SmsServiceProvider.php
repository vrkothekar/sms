<?php

namespace VRKOTHEKAR\SMS;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register(){
        $this->publishes([
            __DIR__ . '/Config/sms.php' => config_path('sms.php'),
        ], 'config');
    }

    public function boot(){
        require __DIR__ . "./SMS.php";
    }
}