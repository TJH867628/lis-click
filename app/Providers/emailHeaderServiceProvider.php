<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\tbl_masterdata;

class emailHeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer([
            'page.superadmin.navigationBar',
        ], function ($view) {
            $logo = tbl_masterdata::where('masterdata_name', 'navigationBarLogo')->first()->masterdata_value;
            $view->with('navigationBarLogo', $logo);
        });
    }
}
