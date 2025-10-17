<?php

namespace App\Domain\Plans\ValueObjets;

class PlanPrice
{
    public function __construct(public float $value)
    {
        if($value <= 0){
            throw new \Exception('Price invalid');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
