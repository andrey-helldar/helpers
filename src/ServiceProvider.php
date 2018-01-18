<?php

namespace Helldar\Helpers;

use Helldar\Helpers\Support\Messages;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton([Messages::class => 'flash']);
    }

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        //
    }
}
