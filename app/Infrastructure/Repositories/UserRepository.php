<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Companies\ValueObjets\CompanyId;
use App\Domain\Users\Entities\User;
use App\Domain\Users\Repositories\UserInterface;
use App\Domain\Users\ValueObjets\UserEmail;
use App\Domain\Users\ValueObjets\UserId;
use App\Infrastructure\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    public function create(User $user): User
    {
        UserModel::create([
            'name' => $user->name,
            'email' => $user->email->value,
            'password' => Hash::make($user->password),
            'company_id' => $user->companyId->getValue(),
        ]);

        return $user;
    }

    public function update(User $user): User
    {
        $model = UserModel::findOrFail($user->id->getValue());

        $data = [
            'name' => $user->name,
            'email' => $user->email->value,
            'password' => Hash::make($user->password),
        ];
        $model->update($data);

        return $user;
    }

    public function delete(string $id): void{
        UserModel::findOrFail($id)->delete();
    }

    public function findById(string $id): User
    {
        $user = UserModel::findOrFail($id);
        return new User(
            id: new UserId($user->id),
            name: $user->name,
            email: new UserEmail($user->email),
            password: $user->password,
            companyId: new CompanyId($user->company_id),
        );
    }

    public function findAll(): array
    {
        return UserModel::all()->map(fn($user) => new User(
            id: new UserId($user->id),
            name: $user->name,
            email: new UserEmail($user->email),
            password: $user->password,
            companyId: new CompanyId($user->company_id),
        ))->toArray();
    }

    public function findByCompanyId(string $companyId): array
    {
        return UserModel::where('company_id', $companyId)->get()->map(fn($user) => new User(
            id: new UserId($user->id),
            name: $user->name,
            email: new UserEmail($user->email),
            password: $user->password,
            companyId: new CompanyId($user->company_id),
        ))->toArray();
    }
}
