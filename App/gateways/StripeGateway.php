<?php

namespace App\Gateways;

use App\Contracts\PaymentGatewayInterface;

class StripeGateway implements PaymentGatewayInterface
{
    public function processPayment(float $amount): array
    {
        return ['message' => "Processando pagamento de R$ {$amount} via Stripe."];
    }
}
