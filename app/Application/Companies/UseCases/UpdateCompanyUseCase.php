<?php

namespace App\Application\Companies\UseCases;

use App\Application\Companies\DTOs\UpdateCompanyDTO;
use App\Domain\Companies\Entities\Company;
use App\Domain\Companies\Repositories\CompanyInterface;

class UpdateCompanyUseCase
{
    public function __construct(
        private CompanyInterface $companyInterface
    ){}

    public function execute(UpdateCompanyDTO $updateCompanyDTO)
    {

        $company = $this->companyInterface->findById($updateCompanyDTO->id);

        if(!$company){
            return new \Exception('Company not found');
        }

        $company->name = $updateCompanyDTO->name;
        $company->email = $updateCompanyDTO->email;

        return $this->companyInterface->update($company);
    }
}
