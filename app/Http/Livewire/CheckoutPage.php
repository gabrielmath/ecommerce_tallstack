<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CheckoutPage extends Component
{
    public function render()
    {
        return view('livewire.checkout-page');
    }

    public function confirmPayment()
    {
        $checkout = (new Customer())->checkoutCharge(
            amount: 100000,
            name: 'Air Dots XPTO',
            sessionOptions: [
                'success_url' => 'http://ecommerce_tallstack.test/checkout?checkout_id=xpto',
                'cancel_url'  => 'http://ecommerce_tallstack.test/checkout'
            ]
        );

        return [
            'id' => $checkout->asStripeCheckoutSession()->id,
        ];
    }
}
