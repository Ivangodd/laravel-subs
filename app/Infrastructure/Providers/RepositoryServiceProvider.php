<?php

namespace App\Infrastructure\Providers;

use App\Domain\Companies\Repositories\CompanyInterface;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Domain\Subscription\Repositories\SubscriptionInterface;
use App\Domain\Users\Repositories\UserInterface;
use App\Infrastructure\Repositories\CompanyRepository;
use App\Infrastructure\Repositories\PlanRepository;
use App\Infrastructure\Repositories\SubscriptionRepository;
use App\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PlanInterface::class, PlanRepository::class);
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
        $this->app->bind(SubscriptionInterface::class, SubscriptionRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }
}
