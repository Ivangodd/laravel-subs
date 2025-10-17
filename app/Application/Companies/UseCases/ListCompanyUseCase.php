<?php

namespace App\Application\Companies\UseCases;

use App\Domain\Companies\Repositories\CompanyInterface;

class ListCompanyUseCase
{
    public function __construct(
        private CompanyInterface $companyInterface
    ){}

    public function execute(): array
    {
        return $this->companyInterface->findAll();
    }
}
