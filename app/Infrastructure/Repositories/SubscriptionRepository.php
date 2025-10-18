<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Plans\ValueObjets\PlanId;
use App\Domain\Subscription\Entities\Subscription;
use App\Domain\Subscription\Repositories\SubscriptionInterface;
use App\Domain\Subscription\ValueObjets\SubscriptionId;
use App\Domain\Subscription\ValueObjets\SubscriptionPeriod;
use App\Infrastructure\Models\SubscriptionModel;

class SubscriptionRepository implements SubscriptionInterface
{
    public function create(Subscription $subscription): Subscription
    {
        $model = SubscriptionModel::create([
            'company_id' => $subscription->companyId->getValue(),
            'plan_id' => $subscription->planId->getValue(),
            'start_at' => $subscription->period->startAt,
            'end_at' => $subscription->period->endAt,
        ]);

        return new Subscription(
            id: new SubscriptionId($model->id),
            companyId: new CompanyId($model->company_id),
            planId: new PlanId($model->plan_id),
            period: new SubscriptionPeriod($model->start_at, $model->end_at)
        );
    }

    public function findCompanyId(string $companyId): array
    {
        return SubscriptionModel::where('company_id', $companyId)->get()->map(fn($subscription) => new Subscription(
            id: new SubscriptionId($subscription->id),
            companyId: new CompanyId($subscription->company_id),
            planId: new PlanId($subscription->plan_id),
            period: new SubscriptionPeriod($subscription->start_at, $subscription->end_at)
        ))->toArray();
    }

    public function hasActiveSubscription(string $companyId): bool
    {
        return SubscriptionModel::where('company_id', $companyId)
        ->where('start_at', '<=', now())->where('end_at', '<=', now())->exists();
    }
}
