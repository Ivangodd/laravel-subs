<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Plans\Entities\Plan;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Domain\Plans\ValueObjets\PlanId;
use App\Domain\Plans\ValueObjets\PlanPrice;
use App\Infrastructure\Models\PlanModel;

class PlanRepository implements PlanInterface
{
    public function create(Plan $plan): Plan
    {
        $model = PlanModel::create(
            [
                'name' => $plan->name,
                'price' => $plan->price->value,
                'user_limit' => $plan->userLimit,
                'features' => json_encode($plan->features),
            ]
        );

        return new Plan(
            id: new PlanId($model->id),
            name: $model->name,
            price: new PlanPrice($model->price),
            userLimit: $model->user_limit,
            features: json_decode($model->features)
        );
    }

    public function update(Plan $plan): Plan
    {
        $model = PlanModel::findOrfail($plan->id->getValue());

        $model->update([
            'name' => $plan->name,
            'price' => $plan->price->value,
            'user_limit' => $plan->userLimit,
            'features' => json_encode($plan->features),
        ]);

        return $plan;
    }

    public function delete(string $id): void {
        PlanModel::findOrfail($id)->delete();
    }

    public function findById(string $id): Plan {
       $model = PlanModel::findOrfail($id);

       return new Plan(
            id: new PlanId($model->id),
            name: $model->name,
            price: new PlanPrice($model->price),
            userLimit: $model->user_limit,
            features: json_decode($model->features, true)
        );

    }

    public function findAll(): array {
        return PlanModel::all()->map(
            fn($plan) => new Plan(
                id: new PlanId($plan->id),
                name: $plan->name,
                price: new PlanPrice($plan->price),
                userLimit: $plan->user_limit,
                features: json_decode($plan->features, true)
            )
        )->toArray();
    }
}
