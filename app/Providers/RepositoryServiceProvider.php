<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CartRepositoryInterface;
use App\Repositories\CartRepository;

use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

use App\Repositories\ItemsByCartRepositoryInterface;
use App\Repositories\ItemsByCartRepository;



class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            CartRepositoryInterface::class,
            CartRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            ItemsByCartRepositoryInterface::class,
            ItemsByCartRepository::class
        );


    }

}