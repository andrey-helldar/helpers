<?php

namespace Helldar\Helpers;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/helpers.php' => config_path('helpers.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/helpers.php', 'helpers');
    }

    /**
     * Register a macros for response factory.
     *
     * @see https://gist.github.com/Ellrion/2c7648d3ebdef2cd8ed24ffa78cf1d3d
     */
    protected function registerResponseBuilder()
    {
        $this->app->extend('Illuminate\Contracts\Routing\ResponseFactory', function ($factory, $app) {
            $factory->macro(
                'jsonable',
                function ($generator, $data = [], $status = 200, array $headers = [], $options = 0) use ($app) {
                    return $this->json([], $status, $headers, $options)
                        ->setJson($app['json.factory']->make($generator, $data, $status, $options));
                }
            );

            return $factory;
        });
    }
}
