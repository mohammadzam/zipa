<?php

namespace Modules\Financial\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Financial\Http\Controllers';
    protected $moduleAdminNamespace = 'Modules\Financial\Http\Controllers\Admin';
    protected $moduleSickNamespace = 'Modules\Financial\Http\Controllers\Sick';
    protected $moduleDoctorNamespace = 'Modules\Financial\Http\Controllers\Doctor';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
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

        $this->mapAdminRoutes();

        $this->mapSickRoutes();

        $this->mapDoctorRoutes();
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
            ->namespace($this->moduleNamespace)
            ->group(module_path('Financial', '/Routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleAdminNamespace)
            ->prefix('panel')
            ->group(module_path('Financial', '/Routes/admin.php'));
    }
    protected function mapSickRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleSickNamespace)
            ->prefix('panel')
            ->group(module_path('Financial', '/Routes/sick.php'));
    }
    protected function mapDoctorRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleDoctorNamespace)
            ->prefix('panel')
            ->group(module_path('Financial', '/Routes/doctor.php'));
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
            ->namespace($this->moduleNamespace)
            ->group(module_path('Financial', '/Routes/api.php'));
    }
}
