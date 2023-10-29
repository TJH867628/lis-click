<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\tbl_masterdata;

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
        //
        View::composer('page.*.*', function ($view) {
            $favicon = tbl_masterdata::where('masterdata_name', 'websiteFavicon')->first()->masterdata_value;
            $view->with('favicon', $favicon);
        });
        
    }
}
