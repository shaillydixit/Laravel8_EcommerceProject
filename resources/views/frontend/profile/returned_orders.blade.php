@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Returned Orders</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">My Orders</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Returned Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop cart-->
    <section class="py-4">
        <div class="container">
            <h3 class="d-none">Account</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card shadow-none mb-3 mb-lg-0 border">
                                <div class="card-body">
                                    <div class="list-group list-group-flush"> <a href="{{route('dashboard')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
                                        <a href="{{route('user.orders')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a>
                                        <a href="{{route('returned.orders')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Returned Orders <i class='bx bx-cart-alt fs-5'></i></a>
                                        <a href="{{route('cancelled.orders')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Cancelled Orders <i class='bx bx-cart-alt fs-5'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                    <th>Payment</th>
                                                    <th>Invoice No</th>
                                                    <th>Return Reason</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->order_number}}</td>
                                                    <td>{{$order->order_date}}</td>
                                                    <td>{{$order->payment_method}}</td>
                                                    <td>{{$order->invoice_no}}</td>
                                                    <td>{{$order->return_reason}}</td>
                                                    <td>
                                                        @if($order->return_order == 0)
                                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                                        @elseif($order->return_order == 1)
                                                        <span class="badge badge-pill badge-warning" style="background: #800000;"> Pending </span>
                                                        <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
                                                        @elseif($order->return_order == 2)
                                                        <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                                        @endif
                                                    </td>
                                                    <td>${{$order->amount}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection