<?php

namespace App\Application\Plans\DTOs;

class UpdatePlanDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public float $price,
        public int $userLimit,
        public array $features,
    )
    {}
}
