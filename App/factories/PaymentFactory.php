<?php

namespace App\Factories;

use App\Contracts\PaymentGatewayInterface;
use App\Gateways\PayPalGateway;
use App\Gateways\StripeGateway;
use Exception;

class PaymentFactory
{
    public static function create(string $gateway): PaymentGatewayInterface
    {
        return match ($gateway) {
            'paypal' => new PayPalGateway(),
            'stripe' => new StripeGateway(),
            default => throw new Exception("Gateway não suportado"),
        };
    }
}
