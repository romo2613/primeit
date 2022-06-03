<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Domain\UuidGenerator;
use Src\Shared\Infrastructure\RamseyUuidGenerator;

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
            UuidGenerator::class,
            RamseyUuidGenerator::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //cargar las migraciones desde BoundedContext

        $this->loadMigrationsFrom(
            \File::allFiles(base_path('src/BoundedContext/**/Infrastructure/migrations'))
        );
    }
}
