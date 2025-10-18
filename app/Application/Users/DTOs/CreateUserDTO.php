<?php

namespace App\Application\Users\DTOs;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $companyId,
    ){}
}
