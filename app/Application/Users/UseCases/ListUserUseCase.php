<?php

namespace App\Application\Users\UseCases;

use App\Domain\Users\Repositories\UserInterface;

class ListUserUseCase
{
    public function __construct(
        private UserInterface $userInterface,
    ) {}

    public function execute(): array
    {
        return $this->userInterface->findAll();
    }
}
