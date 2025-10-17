<?php

namespace App\Infrastructure\Providers;

use App\Application\Plans\UseCases\CreatePlanUseCase;
use App\Application\Plans\UseCases\DeletePlanUseCase;
use App\Application\Plans\UseCases\ListPlanUseCase;
use App\Application\Plans\UseCases\UpdatePlanUseCase;
use App\Domain\Plans\Repositories\PlanInterface;
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
    }
}
