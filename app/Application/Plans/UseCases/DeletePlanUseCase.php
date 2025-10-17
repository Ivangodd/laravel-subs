<?php

namespace App\Application\Plans\UseCases;

use App\Domain\Plans\Repositories\PlanInterface;

class DeletePlanUseCase
{
    public function __construct(
        private PlanInterface $planInterface
    ){}

    public function execute(string $id): void{
        $this->planInterface->delete($id);
    }
}
