<?php

use App\Facades\Stripe;
use App\Http\Livewire\CheckoutPage;
use Laravel\Cashier\Checkout;

use function Pest\Laravel\mock;

it('should create a cashier checkout', function () {
    $checkout = mock(Checkout::class)
        ->shouldReceive('asStripeCheckoutSession')
        ->andReturn((object)['id' => 'meuId'])
        ->once()
        ->getMock();

    Stripe::shouldReceive('createCheckoutSession')
        ->once()
        ->andReturn($checkout);

    $this->livewire(CheckoutPage::class)
        ->call('confirmPayment');
});
