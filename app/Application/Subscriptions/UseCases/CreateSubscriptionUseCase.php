<?php

namespace App\Application\Subscriptions\UseCases;

use App\Application\Subscriptions\DTOs\CreateSubscriptionDTO;
use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Plans\ValueObjets\PlanId;
use App\Domain\Subscription\Entities\Subscription;
use App\Domain\Subscription\Repositories\SubscriptionInterface;
use App\Domain\Subscription\ValueObjets\SubscriptionPeriod;

class CreateSubscriptionUseCase
{
    public function __construct(
        private SubscriptionInterface $subscriptionInterface
    ){}

    public function execute(CreateSubscriptionDTO $createSubscriptionDTO): Subscription
    {
        $subscription = new Subscription(
            null,
            companyId: new CompanyId($createSubscriptionDTO->companyId),
            planId: new PlanId($createSubscriptionDTO->planId),
            period: new SubscriptionPeriod($createSubscriptionDTO->startAt, $createSubscriptionDTO->endAt)
        );

        return $this->subscriptionInterface->create($subscription);
    }
}
