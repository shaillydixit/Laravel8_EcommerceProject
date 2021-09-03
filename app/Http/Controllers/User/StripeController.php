<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        if (Session::has('coupan')) {
            $total_amount = Session::get('coupan')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }
        \Stripe\Stripe::setApiKey('sk_test_51JMnjqSCHbQQxw8mXiEo1FVkcw04kBGOMppQlWVTTpWoGuOdRT6u1sWXPquIsF1LN8FgQqzelVq2Poo32Pzkg5cc00F4RLhY3E');
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'INR',
            'description' => 'Shailly Ecommerce',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'shipping_zipcode' => $request->shipping_zipcode,
            'shipping_address' => $request->shipping_address,
            'shipping_landmark' => $request->shipping_landmark,
            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),
        ]);



        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupan')) {
            Session::forget('coupan');
        }

        Cart::destroy();

        $notification = [
            'message' => 'Your Order Placed Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('dashboard')->with($notification);
    }
}
