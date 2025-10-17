<?php

namespace App\Application\Companies\UseCases;

use App\Domain\Companies\Repositories\CompanyInterface;

class DeleteCompanyUseCase
{
    public function __construct(
        private CompanyInterface $companyInterface
    ){}

    public function execute(string $id): void
    {
        $this->companyInterface->delete($id);
    }
}
