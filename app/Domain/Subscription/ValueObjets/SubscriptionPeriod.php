<?php

namespace App\Domain\Subscription\ValueObjets;

use DateTime;

class SubscriptionPeriod
{
    public function __construct(
        public DateTime $startAt,
        public DateTime $endAt
    ){}
}
