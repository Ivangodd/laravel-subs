<?php

namespace App\Domain\Subscription\Repositories;

use App\Domain\Subscription\Entities\Subscription;

interface SubscriptionInterface
{
    public function create(Subscription $subscription): Subscription;
    public function hasActiveSubscription(string $companyId): bool;
    public function findCompanyId(string $companyId): array;
}
