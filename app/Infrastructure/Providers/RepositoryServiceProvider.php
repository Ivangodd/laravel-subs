<?php

namespace App\Infrastructure\Providers;

use App\Domain\Companies\Repositories\CompanyInterface;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Infrastructure\Repositories\CompanyRepository;
use App\Infrastructure\Repositories\PlanRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PlanInterface::class, PlanRepository::class);
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
    }
}
