<?php

namespace App\Services;

use App\Models\Customer;
use Laravel\Cashier\Checkout;

class Stripe
{
    public function createCheckoutSession(Customer $customer): Checkout
    {
        return $customer->checkoutCharge(
            amount: 100000,
            name: 'Air Dots XPTO',
            sessionOptions: [
                'success_url' => 'http://ecommerce_tallstack.test/checkout?checkout_id=xpto',
                'cancel_url'  => 'http://ecommerce_tallstack.test/checkout'
            ]
        );
    }
}
