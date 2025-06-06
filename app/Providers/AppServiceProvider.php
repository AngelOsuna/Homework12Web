<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Manually load routes from api.php
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

        // Manually load routes from web.php
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
