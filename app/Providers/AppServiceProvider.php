<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Repository
use App\Repositories\BaseRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
//interface
use App\Repositories\RepositoryInterface\BaseRepositoryInterface;
use App\Repositories\RepositoryInterface\ProductRepositoryInterface;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
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
