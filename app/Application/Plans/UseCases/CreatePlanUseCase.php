<?php

namespace App\Application\Plans\UseCases;

use App\Application\Plans\DTOs\CreatePlanDTO;
use App\Domain\Plans\Entities\Plan;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Domain\Plans\ValueObjets\PlanPrice;
use Illuminate\Support\Facades\Log;

class CreatePlanUseCase
{
    public function __construct(
        private PlanInterface $planInterface
    ){}

    public function execute(CreatePlanDTO $createDto): Plan
    {
        $plan = new Plan(
            null,
            $createDto->name,
            new PlanPrice($createDto->price),
            $createDto->userLimit,
            $createDto->features,
        );

        return $this->planInterface->create($plan);
    }
}
