<?php

namespace App\Application\Companies\DTOs;

class UpdateCompanyDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
    )
    {}
}
