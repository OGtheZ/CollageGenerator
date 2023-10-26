<?php

namespace App\Providers;

use App\Interfaces\CollageManagerInterface;
use App\Managers\InterventionCollageManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CollageManagerInterface::class, InterventionCollageManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
