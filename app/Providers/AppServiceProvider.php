<?php

namespace App\Providers;

use App\Models\MenuItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         View::composer('*', function ($view) {
        // We use a singleton or check if already set to avoid multiple queries
        if (!View::shared('dynamicMenu')) {
             $view->with('dynamicMenu', MenuItem::displayable()->get());
        }
    });
    }
}
