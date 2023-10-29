<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\tbl_masterdata;
use Illuminate\Support\Facades\View;

class NavigationbarServiceProvider extends ServiceProvider
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
        View::composer('page.*.navigationBar', function ($view) {
            $logo = tbl_masterdata::where('masterdata_name', 'navigationBarLogo')->first()->masterdata_value;
            $view->with('navigationBarLogo', $logo);
        });

        View::composer('emails.header', function ($view) {
            $emailLogo = tbl_masterdata::where('masterdata_name', 'emailLogo')->first()->masterdata_value;
            $view->with('emailLogo', $emailLogo);
        });
    }
}
