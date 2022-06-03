<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\BoundedContext\Product\Domain\ProductRepository;
use Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent\ProductRepository as EloquentProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepository::class,
            EloquentProductRepository::class,
        );
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
