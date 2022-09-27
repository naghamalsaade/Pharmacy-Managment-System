<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/user/info';

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

        $this->mapBranchRoutes();

        $this->mapInventoryRoutes();

        $this->mapPharmacyRoutes();

        $this->mapMailRoutes();

        $this->mapNotificationRoutes(); 

        $this->mapProductRoutes();

        $this->mapStripeRoutes();

        $this->mapUserRoutes();


        //
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

    protected function mapBranchRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/branch.php'));
    }

    protected function mapInventoryRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/inventory.php'));
    }

    protected function mapPharmacyRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/pharmacy.php'));
    }

    protected function mapMailRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/mail.php'));
    }

    protected function mapNotificationRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/notification.php'));
    }
        
    protected function mapProductRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/product.php'));
    }

    protected function mapStripeRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/stripe.php'));
    }

    protected function mapUserRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/user.php'));
    }

}
