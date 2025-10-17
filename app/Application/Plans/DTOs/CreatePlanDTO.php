<?php

namespace App\Application\Plans\DTOs;

class CreatePlanDTO
{
    public function __construct(
        public string $name,
        public float $price,
        public int $userLimit,
        public array $features,
    )
    {}
}
