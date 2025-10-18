<?php

namespace App\Application\Users\UseCases;

use App\Domain\Users\Repositories\UserInterface;

class DeleteUserUseCase
{
    public function __construct(
        private UserInterface $userInterface,
    ) {}

    public function execute(string $id): void
    {
        $this->userInterface->delete($id);
    }
}
