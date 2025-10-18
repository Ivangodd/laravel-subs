<?php

namespace App\Application\Users\UseCases;

use App\Application\Users\DTOs\CreateUserDTO;
use App\Application\Users\DTOs\UpdateUserDTO;
use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Domain\Subscription\Repositories\SubscriptionInterface;
use App\Domain\Users\Entities\User;
use App\Domain\Users\Repositories\UserInterface;
use App\Domain\Users\ValueObjets\UserEmail;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Gate;

class UpdateUserUseCase
{
    public function __construct(
        private UserInterface $userInterface,
    ) {}

    public function execute(UpdateUserDTO $updateUserDTO): User
    {
        $user = $this->userInterface->findById($updateUserDTO->id);

        if (!$user) {
            throw new \Exception('User not found');
        }

        $user->name = $updateUserDTO->name;
        $user->email = new UserEmail($updateUserDTO->email);
        $user->password = $updateUserDTO->password;

        return $this->userInterface->update($user);
    }
}
