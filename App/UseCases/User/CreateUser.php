<?php

namespace App\UseCases\User;

use App\Repositories\UserRepository;

class CreateUser
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $name, string $email)
    {
        return $this->repository->create($name, $email);
    }
}
