<?php

namespace App\Providers;

use App\DataServices\CityDataService;
use App\DataServices\CompanyDataService;
use App\DataServices\Contracts\CityDataServiceContract;
use App\DataServices\Contracts\CompanyDataServiceContract;
use App\DataServices\Contracts\JobDataServiceContract;
use App\DataServices\Contracts\TypeDataServiceContract;
use App\DataServices\JobDataService;
use App\DataServices\TypeDataService;
use App\Services\CityService;
use App\Services\CompanyService;
use App\Services\Contracts\CityServiceContract;
use App\Services\Contracts\CompanyServiceContract;
use App\Services\Contracts\JobServiceContract;
use App\Services\Contracts\TypeServiceContract;
use App\Services\JobService;
use App\Services\TypeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //DataServices
        $this->app->bind(JobDataServiceContract::class, JobDataService::class);
        $this->app->bind(CityDataServiceContract::class, CityDataService::class);
        $this->app->bind(CompanyDataServiceContract::class, CompanyDataService::class);
        $this->app->bind(TypeDataServiceContract::class, TypeDataService::class);

        //Services
        $this->app->bind(JobServiceContract::class, JobService::class);
        $this->app->bind(CityServiceContract::class, CityService::class);
        $this->app->bind(CompanyServiceContract::class, CompanyService::class);
        $this->app->bind(TypeServiceContract::class, TypeService::class);
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
