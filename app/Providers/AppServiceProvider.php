<?php

namespace App\Providers;

use App\Http\repositories\CityRepositoryInterface;
use App\Http\repositories\CustomerRepositoryInterface;
use App\Http\repositories\eloquent\CityEloquentRepository;
use App\Http\repositories\eloquent\CustomerEloquentRepository;
use App\Http\services\CityServiceInterface;
use App\Http\services\CustomerServiceInterface;
use App\Http\services\implement\CityService;
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
        $this->app->singleton(CustomerServiceInterface::class, CustomerService::class);
        $this->app->singleton(CustomerRepositoryInterface::class, CustomerEloquentRepository::class);
        $this->app->singleton(CityServiceInterface::class, CityService::class);
        $this->app->singleton(CityRepositoryInterface::class, CityEloquentRepository::class);
    }
}
