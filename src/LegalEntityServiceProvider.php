<?php

namespace Railken\LaraOre;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Railken\LaraOre\Api\Support\Router;

class LegalEntityServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ore.legal-entity.php' => config_path('ore.legal-entity.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutes();

        config(['ore.user.permission.managers' => array_merge(Config::get('ore.user.permission.managers'), [
            \Railken\LaraOre\LegalEntity\LegalEntityManager::class,
        ])]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\ApiServiceProvider::class);
        $this->app->register(\Railken\LaraOre\UserServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../config/ore.legal-entity.php', 'ore.legal-entity');
    }
    
    /**
    * Load routes.
    *
    * @return void
    */
    public function loadRoutes()
    {
        Router::group(array_merge(Config::get('ore.legal-entity.router'), [
            'namespace' => 'Railken\LaraOre\Http\Controllers',
        ]), function ($router) {
            $router->get('/', ['uses' => 'LegalEntitiesController@index']);
            $router->post('/', ['uses' => 'LegalEntitiesController@create']);
            $router->put('/{id}', ['uses' => 'LegalEntitiesController@update']);
            $router->delete('/{id}', ['uses' => 'LegalEntitiesController@remove']);
            $router->get('/{id}', ['uses' => 'LegalEntitiesController@show']);
        });
    }
}
