@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Order Details</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">My Orders</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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
                                        <a href="{{route('user.address')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
                                        <a href="{{route('user.payment')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
                                        <a href="{{route('user.profile')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Account Details <i class='bx bx-user-circle fs-5'></i></a>
                                        <a href="{{route('user.logout')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h6>Shipping Details</h6>
                                        <table class="table">
                                            <tr>
                                                <th> Shipping Name : </th>
                                                <th> {{ $order->first_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> Shipping Phone : </th>
                                                <th> {{ $order->shipping_phone }} </th>
                                            </tr>

                                            <tr>
                                                <th> Shipping Email : </th>
                                                <th> {{ $order->shipping_email }} </th>
                                            </tr>

                                            <tr>
                                                <th> Division : </th>
                                                <th> {{ $order->division->division_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> District : </th>
                                                <th> {{ $order->district->district_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> State : </th>
                                                <th>{{ $order->state->state_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> Post Code : </th>
                                                <th> {{ $order->shipping_zipcode }} </th>
                                            </tr>

                                            <tr>
                                                <th> Order Date : </th>
                                                <th> {{ $order->order_date }} </th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h6>Order Details <span class="text-danger">Invoice: {{$order->invoice_no}}</span></h6>
                                        <table class="table">
                                            <tr>
                                                <th> Name : </th>
                                                <th> {{ $order->user->name }} </th>
                                            </tr>

                                            <tr>
                                                <th> Phone : </th>
                                                <th> {{ $order->user->phone }} </th>
                                            </tr>

                                            <tr>
                                                <th> PaymentType : </th>
                                                <th> {{ $order->payment_method }} </th>
                                            </tr>

                                            <tr>
                                                <th> Trans. ID : </th>
                                                <th> {{ $order->transaction_id }} </th>
                                            </tr>

                                            <tr>
                                                <th> Order No : </th>
                                                <th> {{ $order->order_number }} </th>
                                            </tr>

                                            <tr>
                                                <th> Invoice : </th>
                                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                                            </tr>

                                            <tr>
                                                <th> Order Total : </th>
                                                <th>{{ $order->amount }} </th>
                                            </tr>

                                            <tr>
                                                <th> Order : </th>
                                                <th>
                                                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
                                                </th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-lg-8">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Image</th>
                                                                <th>Product Name</th>
                                                                <th>Product Code</th>
                                                                <th>Color</th>
                                                                <th>Size</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($orderItem as $item)
                                                            <tr>
                                                                <td><img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;"></td>
                                                                <td>{{ $item->product->product_name }}</td>
                                                                <td>{{ $item->product->product_code }}</td>
                                                                <td>{{ $item->color }}</td>
                                                                <td>{{ $item->size }}</td>
                                                                <td>{{ $item->qty }}</td>
                                                                <td>$ {{ $item->price * $item->qty}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection