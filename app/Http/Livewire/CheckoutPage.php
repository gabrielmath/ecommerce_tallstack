<?php

namespace App\Http\Livewire;

use App\Facades\Stripe;
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
        $checkout = Stripe::createCheckoutSession(new Customer());

        return [
            'id' => $checkout->asStripeCheckoutSession()->id,
        ];
    }
}
