<?php

namespace App\Controllers;

use Flight;
use App\UseCases\User\CreateUser;
use App\Repositories\UserRepository;

class UserController
{
    private CreateUser $createUser;

    public function __construct()
    {
        $this->createUser = new CreateUser(new UserRepository());
    }

    public function index()
    {
        $repo = new UserRepository();
        Flight::json($repo->findAll());
    }

    public function store()
    {
        $data = Flight::request()->data;
        $user = $this->createUser->execute($data->name, $data->email);

        if ($user) {
            Flight::json($user, 201);
        } else {
            Flight::json(['error' => 'Erro ao criar usuário'], 400);
        }
    }
}
