<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
    public function PendingOrders()
    {
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    }

    public function PendingOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('backend.orders.pending_order_details', compact('order', 'orderItem'));
    }

    public function ConfirmedOrders()
    {
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    }

    public function ProcessingOrders()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    }

    public function PickedUpOrders()
    {
        $orders = Order::where('status', 'pickedup')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pickedup_orders', compact('orders'));
    }

    public function ShippedOrders()
    {
        $orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders', compact('orders'));
    }


    public function DeliveredOrders()
    {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    }

    public function CancelledOrders()
    {
        $orders = Order::where('status', 'cancelled')->orderBy('id', 'DESC')->get();
        return view('backend.orders.cancelled_orders', compact('orders'));
    }

    public function PendingConfirm($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'confirmed']);
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending.orders')->with($notification);
    }

    public function ConfirmProcessing($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'processing']);
        $notification = array(
            'message' => 'Order Processed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed.orders')->with($notification);
    }

    public function ProcessingPickedup($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'pickedup']);
        $notification = array(
            'message' => 'Order PickedUp Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing.orders')->with($notification);
    }

    public function PickedupShipped($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'shipped']);
        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pickedup.orders')->with($notification);
    }

    public function ShippedDelivered($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'delivered']);
        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('delivered.orders')->with($notification);
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('backend.orders.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
