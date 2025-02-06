<?php

namespace App\Controllers;

use Flight;
use App\Factories\PaymentFactory;
use App\Services\PaymentService;

class PaymentController
{
    public function pay()
    {
        $data = Flight::request()->data;
        $gateway = PaymentFactory::create($data->gateway);
        $service = new PaymentService($gateway);
        $result = $service->pay($data->amount);

        return Flight::json($result);
        // return $data;
    }
}
