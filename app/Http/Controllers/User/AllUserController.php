<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class AllUserController extends Controller
{
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserPayment()
    {
        return view('frontend.profile.user_payment');
    }

    public function UserOrders()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.profile.user_orders', compact('orders'));
    }

    public function UserAddress()
    {
        return view('frontend.profile.user_address');
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function OrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('frontend.profile.order_details', compact('order', 'orderItem'));
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        // return view('frontend.profile.order_invoice', compact('order', 'orderItem'));

        $pdf = PDF::loadView('frontend.profile.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}