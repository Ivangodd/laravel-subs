<?php

namespace App\Domain\Users\ValueObjets;

class UserId
{
    public function __construct(public int $value)
    {
        if($value <= 0){
            throw new \Exception('User id invalid');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
