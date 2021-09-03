<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51JMnjqSCHbQQxw8mXiEo1FVkcw04kBGOMppQlWVTTpWoGuOdRT6u1sWXPquIsF1LN8FgQqzelVq2Poo32Pzkg5cc00F4RLhY3E');
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999 * 100,
            'currency' => 'INR',
            'description' => 'Example charge',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);
    }
}
