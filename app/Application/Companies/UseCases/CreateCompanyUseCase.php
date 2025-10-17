<?php

namespace App\Application\Companies\UseCases;

use App\Application\Companies\DTOs\CreateCompanyDTO;
use App\Domain\Companies\Entities\Company;
use App\Domain\Companies\Repositories\CompanyInterface;

class CreateCompanyUseCase
{
    public function __construct(
        private CompanyInterface $companyInterface
    ){}

    public function execute(CreateCompanyDTO $createCompanyDTO): Company
    {
        $company = new Company(
            null,
            $createCompanyDTO->name,
            $createCompanyDTO->email,
        );

        return $this->companyInterface->create($company);
    }
}
