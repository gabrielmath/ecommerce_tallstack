<?php

namespace App\Http\Controllers\Stripe;

use Laravel\Cashier\Http\Controllers\WebhookController as StripeWebhookController;

class WebhookController extends StripeWebhookController
{
    public function handleChargeSucceeded($event)
    {
        \Log::debug('stripe event', $event);
    }
}
