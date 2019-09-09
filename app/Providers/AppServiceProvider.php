<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Twitter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
          $this->app->bind(
              \App\Repositories\UserRepository::class,
              \App\Repositories\DbUserRepository::class
          );

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
