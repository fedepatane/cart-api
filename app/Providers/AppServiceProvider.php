<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CartRepositoryInterface;
use App\Repositories\CartRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


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
