<?php

namespace App\Domain\Subscription\Entities;

use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Plans\ValueObjets\PlanId;
use App\Domain\Subscription\ValueObjets\SubscriptionId;
use App\Domain\Subscription\ValueObjets\SubscriptionPeriod;

class Subscription
{
    public function __construct(
        public ?SubscriptionId $id = null,
        public CompanyId $companyId,
        public PlanId $planId,
        public SubscriptionPeriod $period,
    ){}
}
