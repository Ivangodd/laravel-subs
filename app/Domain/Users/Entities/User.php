<?php

namespace App\Domain\Users\Entities;

use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Users\ValueObjets\UserEmail;
use App\Domain\Users\ValueObjets\UserId;

class User
{
    public function __construct(
        public ?UserId $id = null,
        public string $name,
        public UserEmail $email,
        public string $password,
        public CompanyId $companyId
    ){}
}
