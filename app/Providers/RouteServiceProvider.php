<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapFranchiseRoutes();

        $this->mapFranchiseeRoutes();

        $this->mapClientRoutes();

        $this->mapEmployeeRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "employee" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapEmployeeRoutes()
    {
        Route::group([
            'middleware' => ['web', 'employee', 'auth:employee'],
            'prefix' => 'employee',
            'as' => 'employee.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/employee.php');
        });
    }

    /**
     * Define the "client" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapClientRoutes()
    {
        Route::group([
            'middleware' => ['web', 'client', 'auth:client'],
            'prefix' => 'client',
            'as' => 'client.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/client.php');
        });
    }

    /**
     * Define the "franchisee" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapFranchiseeRoutes()
    {
        Route::group([
            'middleware' => ['web', 'franchisee', 'auth:franchisee'],
            'prefix' => 'franchisee',
            'as' => 'franchisee.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/franchisee.php');
        });
    }

    /**
     * Define the "franchise" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapFranchiseRoutes()
    {
        Route::group([
            'middleware' => ['web', 'franchise', 'auth:franchise'],
            'prefix' => 'franchise',
            'as' => 'franchise.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/franchise.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
