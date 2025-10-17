<?php

namespace App\Domain\Companies\ValueObjets;

class CompanyId
{
    public function __construct(public int $value)
    {
        if($value <= 0){
            throw new \Exception('Company id invalid');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
