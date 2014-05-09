<?php

namespace Inthraonsap\Carabiner;

use Illuminate\Support\ServiceProvider;

class CarabinerServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['carabiner'] = $this->app->share(function($app)
                {
                    return new Carabiner($app['config'], $app['url'], $app['files'], $app['view']);
                });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('inthraonsap/carabiner');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array("carabiner");
    }

}
