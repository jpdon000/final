<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SiteSettings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public  function register()
    {
        $this->app->singleton('site_settings', function(){
          return SiteSettings::all()->pluck('value','key')->toArray();
        });
      
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
