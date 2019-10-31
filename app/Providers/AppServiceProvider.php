<?php

namespace App\Providers;

use App\Http\repositories\CustomerRepositoryInterface;
use App\Http\repositories\eloquent\CustomerEloquentRepository;
use App\Http\services\CustomerServiceInterface;
use App\Http\services\implement\CustomerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->singleton(CustomerServiceInterface::class,CustomerService::class);
        $this->app->singleton(CustomerRepositoryInterface::class,CustomerEloquentRepository::class);
    }
}
