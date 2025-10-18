<?php

namespace App\Application\Companies\UseCases;

use App\Domain\Companies\Entities\Company;
use App\Domain\Companies\Repositories\CompanyInterface;

class ShowCompanyUseCase
{
    public function __construct(
        private CompanyInterface $companyInterface
    ){}

    public function execute(string $id): Company
    {
        $company = $this->companyInterface->findById($id);

        return $company;
    }
}
