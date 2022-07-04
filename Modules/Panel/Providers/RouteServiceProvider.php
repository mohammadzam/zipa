<?php

namespace Modules\Panel\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Panel\Http\Controllers';
    protected $moduleAdminNamespace = 'Modules\Panel\Http\Controllers\Admin';
    protected $moduleDoctorNamespace = 'Modules\Panel\Http\Controllers\Doctor';
    protected $moduleSickNamespace = 'Modules\Panel\Http\Controllers\Sick';

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

        $this->mapDoctorRoutes();

        $this->mapSickRoutes();
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
            ->group(module_path('Panel', '/Routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleAdminNamespace)
            ->group(module_path('Panel', '/Routes/admin.php'));
    }

    protected function mapDoctorRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleDoctorNamespace)
            ->group(module_path('Panel', '/Routes/doctor.php'));
    }

    protected function mapSickRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleSickNamespace)
            ->group(module_path('Panel', '/Routes/sick.php'));
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
            ->group(module_path('Panel', '/Routes/api.php'));
    }
}
