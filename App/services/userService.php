<?php

namespace App\Services;

use App\Repositories\UserRepository;

class userService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(string $name, string $email)
    {
        return $this->repository->create($name, $email);
    }
}
