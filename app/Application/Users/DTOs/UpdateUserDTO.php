<?php

namespace App\Application\Users\DTOs;

class UpdateUserDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $password,
    ){}
}
