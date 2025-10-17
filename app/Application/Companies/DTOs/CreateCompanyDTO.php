<?php

namespace App\Application\Companies\DTOs;

class CreateCompanyDTO
{
    public function __construct(
        public string $name,
        public string $email,
    )
    {}
}
