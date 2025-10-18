<?php

namespace App\Application\Subscriptions\DTOs;

use Carbon\Carbon;

class CreateSubscriptionDTO
{
    public function __construct(
        public string $companyId,
        public string $planId,
        public  Carbon $startAt,
        public  ?Carbon $endAt = null
    ){}
}
