<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Companies\Entities\Company;
use App\Domain\Companies\Repositories\CompanyInterface;
use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Plans\Entities\Plan;
use App\Domain\Plans\ValueObjets\PlanId;
use App\Domain\Plans\ValueObjets\PlanPrice;
use App\Domain\Subscription\Entities\Subscription;
use App\Domain\Subscription\ValueObjets\SubscriptionId;
use App\Domain\Subscription\ValueObjets\SubscriptionPeriod;
use App\Infrastructure\Models\CompanyModel;
use DateTime;

class CompanyRepository implements CompanyInterface
{
    public function create(Company $company): Company
    {
        $model = CompanyModel::create(
            [
                'name' => $company->name,
                'email' => $company->email,
            ]
        );

        return new Company(
            id: new CompanyId($model->id),
            name: $model->name,
            email: $model->email
        );
    }

    public function update(Company $company): Company
    {
        $model = CompanyModel::findOrfail($company->id->getValue());

        $model->update([
            'name' => $company->name,
            'email' => $company->email,
        ]);

        return $company;
    }

    public function delete(string $id): void {
        CompanyModel::findOrfail($id)->delete();
    }

    public function findById(string $id): Company {
       $model = CompanyModel::findOrfail($id);

       return new Company(
            id: new CompanyId($model->id),
            name: $model->name,
            email: $model->email,

            subcription: $model->currentSubscription ? new Subscription(
                    id: new SubscriptionId($model->currentSubscription->id),
                    companyId: new CompanyId($model->currentSubscription->company_id),
                    planId: new PlanId($model->currentSubscription->plan_id),
                    period: new SubscriptionPeriod(
                        startAt: new DateTime($model->currentSubscription->start_at),
                        endAt: new DateTime($model->currentSubscription->end_at)
                    )
                ) : null,
            plan: $model->currentSubscription ? new Plan(
                    id: new PlanId($model->currentSubscription->plan->id),
                    name: $model->currentSubscription->plan->name,
                    price: new PlanPrice($model->currentSubscription->plan->price),
                    userLimit: $model->currentSubscription->plan->user_limit,
                    features: json_decode($model->currentSubscription->plan->features),
                ) : null
        );

    }

    public function findAll(): array {
        return CompanyModel::all()->map(
            fn(CompanyModel $company) => new Company(
                id: new CompanyId($company->id),
                name: $company->name,
                email: $company->email,

                subcription: $company->currentSubscription ? new Subscription(
                    id: new SubscriptionId($company->currentSubscription->id),
                    companyId: new CompanyId($company->currentSubscription->company_id),
                    planId: new PlanId($company->currentSubscription->plan_id),
                    period: new SubscriptionPeriod(
                        startAt: new DateTime($company->currentSubscription->start_at),
                        endAt: new DateTime($company->currentSubscription->end_at)
                    )
                ) : null,

                plan: $company->currentSubscription ? new Plan(
                    id: new PlanId($company->currentSubscription->plan->id),
                    name: $company->currentSubscription->plan->name,
                    price: new PlanPrice($company->currentSubscription->plan->price),
                    userLimit: $company->currentSubscription->plan->user_limit,
                    features: json_decode($company->currentSubscription->plan->features),
                ) : null
            )
        )->toArray();
    }
}
