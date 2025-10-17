<?php

namespace App\Domain\Companies\Entities;

use App\Domain\Companies\ValueObjets\CompanyId;

class Company
{
    public function __construct(
        public ?CompanyId $id = null,
        public string $name,
        public string $email,
    ){}
}
