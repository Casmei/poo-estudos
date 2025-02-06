<?php

namespace App\Controllers;

use Flight;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UserController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService(new UserRepository());
    }

    public function index()
    {
        $repo = new UserRepository();
        Flight::json($repo->findAll());
    }

    public function store()
    {
        $data = Flight::request()->data;
        $user = $this->userService->create($data->name, $data->email);

        if ($user) {
            Flight::json($user, 201);
        } else {
            Flight::json(['error' => 'Erro ao criar usuário'], 400);
        }
    }
}
