<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function ReturnRequest()
    {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.returns.return_request', compact('orders'));
    }

    public function ReturnApprove($order_id)
    {
        Order::where('id', $order_id)->update(['return_order' => 2]);

        $notification = [
            'message' => 'Return Request Approved Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AllReturnRequest()
    {
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('backend.returns.all_request', compact('orders'));
    }
}
