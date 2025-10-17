<?php

namespace App\Domain\Companies\Repositories;

use App\Domain\Companies\Entities\Company;

interface CompanyInterface
{
    public function create(Company $company): Company;
    public function update(Company $company): Company;
    public function delete(string $id): void;
    public function findById(string $id): Company;
    public function findAll(): array;
}
