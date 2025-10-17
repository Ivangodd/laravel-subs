<?php

namespace App\Application\Plans\UseCases;

use App\Domain\Plans\Entities\Plan;
use App\Domain\Plans\Repositories\PlanInterface;

class ShowPlanUseCase
{
    public function __construct(
        private PlanInterface $planInterface
    ){}

    public function execute(string $id): Plan
    {
        return $this->planInterface->findById($id);
    }
}
