<?php

namespace App\Services;

use App\Contracts\PaymentGatewayInterface;

class PaymentService
{
    private PaymentGatewayInterface $gateway;

    public function __construct(PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function pay(float $amount): array
    {
        return $this->gateway->processPayment($amount);
    }
}
