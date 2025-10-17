<?php

namespace App\Domain\Plans\ValueObjets;

class PlanId
{
    public function __construct(public int $value)
    {
        if($value <= 0){
            throw new \Exception('Plan id invalid');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
