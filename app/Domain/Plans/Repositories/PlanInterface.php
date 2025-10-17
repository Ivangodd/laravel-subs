<?php

namespace App\Domain\Plans\Repositories;

use App\Domain\Plans\Entities\Plan;

interface PlanInterface
{
    public function create(Plan $plan): Plan;
    public function update(Plan $plan): Plan;
    public function delete(string $id): void;
    public function findById(string $id): Plan;
    public function findAll(): array;
}
