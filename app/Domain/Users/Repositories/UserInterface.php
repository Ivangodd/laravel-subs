<?php

namespace App\Domain\Users\Repositories;

use App\Domain\Users\Entities\User;

interface UserInterface
{
    public function create(User $user) : User;
    public function update(User $user) : User;
    public function delete(string $id) : void;
    public function findById(string $id) : User;
    public function findAll() : array;

    public function findByCompanyId(string $companyId): array;
}
