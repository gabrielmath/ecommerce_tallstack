<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static createCheckoutSession(\App\Models\Customer $param)
 */
class Stripe extends Facade
{

    protected static function getFacadeAccessor()
    {
        return \App\Services\Stripe::class;
    }
}
