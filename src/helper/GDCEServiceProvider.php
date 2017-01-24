<?php namespace GDCE\Framework\Helper;

use Illuminate\Support\ServiceProvider;

/**
 * A Laravel 5's package template.
 *
 * @author: Rémi Collin 
 */
class GDCEServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
//        $this->publishes([
//            __DIR__ . '/config/gdce-cnsw-auth.php' => config_path('gdce-cnsw-auth.php')
//        ], 'gdce-cnsw-auth');
    }

        /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
       // return array('laravel-dreamfactory');
    }

}
