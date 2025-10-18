<?php

namespace App\Domain\Users\ValueObjets;

class UserEmail
{
    public function __construct(public string $value)
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            throw new \Exception('email invalid');
        }
    }
}
