<?php

namespace App\Application\Plans\UseCases;

use App\Domain\Plans\Repositories\PlanInterface;

class ListPlanUseCase
{
    public function __construct(
        private PlanInterface $planInterface
    ){}

    public function execute(): array
    {
        return $this->planInterface->findAll();
    }
}
