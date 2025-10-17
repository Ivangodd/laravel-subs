<?php

namespace App\Domain\Plans\Entities;

use App\Domain\Plans\ValueObjets\PlanId;
use App\Domain\Plans\ValueObjets\PlanPrice;

class Plan
{
    public function __construct(
        public ?PlanId $id = null,
        public string $name,
        public PlanPrice $price,
        public int $userLimit,
        public array $features,
    ){}

    public function canAddUser (int $currentUser): bool
    {
        return $currentUser <= $this->userLimit;
    }
}
