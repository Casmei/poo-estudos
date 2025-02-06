<?php

use App\Controllers\UserController;
use App\Controllers\PaymentController;

Flight::route('GET /users', [new UserController(), 'index']);
Flight::route('POST /users', [new UserController(), 'store']);
Flight::route('POST /pay', [new PaymentController(), 'pay']);