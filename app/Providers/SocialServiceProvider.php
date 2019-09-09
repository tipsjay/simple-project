<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Twitter;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(Twitter::class, function(){
            return new Twitter(config('services.twitter.secret'));
      });


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
