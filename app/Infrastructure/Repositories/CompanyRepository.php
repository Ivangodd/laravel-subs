<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Companies\Entities\Company;
use App\Domain\Companies\Repositories\CompanyInterface;
use App\Domain\Companies\ValueObjets\CompanyId;
use App\Infrastructure\Models\CompanyModel;

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
        );

    }

    public function findAll(): array {
        return CompanyModel::all()->map(
            fn($company) => new Company(
                id: new CompanyId($company->id),
                name: $company->name,
                email: $company->email,
            )
        )->toArray();
    }
}
