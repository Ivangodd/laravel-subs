<?php

namespace App\Application\Plans\UseCases;

use App\Application\Plans\DTOs\UpdatePlanDTO;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Domain\Plans\ValueObjets\PlanPrice;

class UpdatePlanUseCase
{
    public function __construct(
        private PlanInterface $planInterface
    ){}

    public function execute(UpdatePlanDTO $updateDto)
    {
        $plan = $this->planInterface->findById($updateDto->id);

        if(!$plan){
            return new \Exception('Plan not found');
        }

        $plan->name = $updateDto->name;
        $plan->price =  new PlanPrice($updateDto->price);
        $plan->userLimit = $updateDto->userLimit;
        $plan->features = $updateDto->features;

        return $this->planInterface->update($plan);
    }
}
