<?php

namespace App\Domain\Subscription\ValueObjets;

class SubscriptionId
{
    public function __construct(public int $value)
    {
        if($value <= 0){
            throw new \Exception('Subscription id invalid');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
