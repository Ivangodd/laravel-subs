<?php

namespace App\Application\Users\UseCases;

use App\Domain\Users\Entities\User;
use App\Domain\Users\Repositories\UserInterface;

class ShowUserUseCase
{
    public function __construct(
        private UserInterface $userInterface,
    ) {}

    public function execute(string $id): User
    {
        return $this->userInterface->findById($id);
    }
}
