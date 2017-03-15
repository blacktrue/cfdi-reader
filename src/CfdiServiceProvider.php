<?php

namespace Blacktrue;

use Blacktrue\Reader\Cfdi;
use Illuminate\Support\ServiceProvider;

class CfdiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Cfdi::class, function () {
            return new Cfdi();
        });
    }
}
