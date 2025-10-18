<?php

namespace App\Infrastructure\Providers;

use App\Application\Plans\UseCases\CreatePlanUseCase;
use App\Application\Plans\UseCases\DeletePlanUseCase;
use App\Application\Plans\UseCases\ListPlanUseCase;
use App\Application\Plans\UseCases\UpdatePlanUseCase;
use App\Application\Subscriptions\DTOs\CreateSubscriptionDTO;
use App\Application\Subscriptions\UseCases\CreateSubscriptionUseCase;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Domain\Subscription\Repositories\SubscriptionInterface;
use Illuminate\Support\ServiceProvider;

class UseCaseServiseProvider extends ServiceProvider
{

    public function register()
    {
        //plan useCases
        $this->app->bind(CreatePlanUseCase::class, function ($useCase) {
            return new CreatePlanUseCase($useCase->make(PlanInterface::class));
        });

        $this->app->bind(UpdatePlanUseCase::class, function ($useCase) {
            return new UpdatePlanUseCase($useCase->make(PlanInterface::class));
        });

        $this->app->bind(ListPlanUseCase::class, function ($useCase) {
            return new ListPlanUseCase($useCase->make(PlanInterface::class));
        });

        $this->app->bind(DeletePlanUseCase::class, function ($useCase) {
            return new DeletePlanUseCase($useCase->make(PlanInterface::class));
        });

        //subscrption useCases

        $this->app->bind(CreateSubscriptionUseCase::class, function ($useCase){
            return new CreateSubscriptionUseCase($useCase->make(SubscriptionInterface::class));
        });
    }
}
