<?php

namespace App\Domain\Companies\Entities;

use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Plans\Entities\Plan;
use App\Domain\Subscription\Entities\Subscription;

class Company
{
    public function __construct(
        public ?CompanyId $id = null,
        public string $name,
        public string $email,
        public ?Subscription $subcription = null,
        public ?Plan $plan = null,
    ){}
}
