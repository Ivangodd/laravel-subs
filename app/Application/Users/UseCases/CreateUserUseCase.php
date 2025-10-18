<?php

namespace App\Application\Users\UseCases;

use App\Application\Users\DTOs\CreateUserDTO;
use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Plans\Repositories\PlanInterface;
use App\Domain\Subscription\Repositories\SubscriptionInterface;
use App\Domain\Users\Entities\User;
use App\Domain\Users\Repositories\UserInterface;
use App\Domain\Users\ValueObjets\UserEmail;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class CreateUserUseCase
{
     public function __construct(
        private UserInterface $userInterface,
        private SubscriptionInterface $subscriptionInterface,
        private PlanInterface $planInterface,
    ){}

     public function execute(CreateUserDTO $createUserDTO): User
    {
        // Gate::authorize('create', [ModelsUser::class, intval($createUserDTO->companyId)]);
        $subscriptions = $this->subscriptionInterface->findCompanyId($createUserDTO->companyId);

        if(!empty($subs)){
            throw new \Exception('Company does not have active subscription');
        }

        $subscription = $subscriptions[0];

        $plan = $this->planInterface->findById($subscription->planId->value);

        if(!$plan){
            throw new \Exception('Plan not found');
        }

        $usersByPlan = count($this->userInterface->findByCompanyId($createUserDTO->companyId));

        if($usersByPlan >= $plan->userLimit){
            throw new \Exception('User Limit');
        }

        $user = new User(
            null,
            name: $createUserDTO->name,
            email: new UserEmail($createUserDTO->email),
            password: $createUserDTO->password,
            companyId: new CompanyId($createUserDTO->companyId)
        );

        return $this->userInterface->create($user);

    }
}
