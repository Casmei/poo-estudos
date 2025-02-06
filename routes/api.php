<?php

use App\Controllers\UserController;

Flight::route('GET /users', [new UserController(), 'index']);
Flight::route('POST /users', [new UserController(), 'store']);
