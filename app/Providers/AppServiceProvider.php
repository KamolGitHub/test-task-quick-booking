<?php

namespace App\Providers;

use App\Repositories\ParcelRepository;
use App\Repositories\ParcelRepositoryContract;
use App\Repository\ParcelImageRepository;
use App\Repository\ParcelImageRepositoryContract;
use App\Repository\ShippingRequestRepository;
use App\Repository\ShippingRequestRepositoryContract;
use App\Services\ParcelService;
use App\Services\ParcelServiceContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        bind repo
        $this->app->bind(ParcelRepositoryContract::class, ParcelRepository::class);
        $this->app->bind(ShippingRequestRepositoryContract::class, ShippingRequestRepository::class);
        $this->app->bind(ParcelImageRepositoryContract::class, ParcelImageRepository::class);

//        bind service
        $this->app->bind(ParcelServiceContract::class, ParcelService::class);
    }
}
