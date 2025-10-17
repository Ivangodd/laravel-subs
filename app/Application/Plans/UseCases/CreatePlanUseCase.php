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
        Log::info('Instancia CreatePlanDTO creada correctamente', [
                'plant' => $plan,
         ]);
        return $this->planInterface->create($plan);
    }
}
