@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Order Tracking</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Order</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container">
            <h6 class="mb-0">Order ID: {{$track->order_number}}</h6>
            <hr>
            <div class="row row-cols-1 row-cols-lg-6 rounded-6 gx-5 m-0 border">
                <div class="col p-4 text-center border-end">
                    <h6 class="mb-1">Order Date</h6>
                    <p class="mb-0">{{$track->order_date}}</p>
                </div>
                <div class="col p-4 text-center border-end">
                    <h6 class="mb-1">Invoice Number</h6>
                    <p class="mb-0">{{$track->invoice_no}}</p>
                </div>
                <div class="col p-4 text-center border-end">
                    <h6 class="mb-1">Shipping By: {{$track->first_name}}</h6>
                    <p class="mb-0">{{$track->division->division_name}} | {{$track->district->district_name}}</p>
                </div>
                <div class="col p-4 text-center border-end">
                    <h6 class="mb-1">User Mobile No: </h6>
                    <p class="mb-0">{{$track->shipping_phone}}</p>
                </div>
                <div class="col p-4 text-center border-end">
                    <h6 class="mb-1">Payment Method: </h6>
                    <p class="mb-0">{{$track->payment_method}}</p>
                </div>
                <div class="col p-4 text-center border-end">
                    <h6 class="mb-1">Total Amount: </h6>
                    <p class="mb-0">{{$track->amount}}</p>
                </div>


            </div>
            <!--end row-->
            <div class="mt-3"></div>
            <div class="checkout-payment">
                <div class="card bg-transparent rounded-0 shadow-none">
                    <div class="card-body">
                        <div class="steps steps-light">
                            @if($track->status == 'pending')
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Pending</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Confirmed</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Processing</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order PickedUp</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Shipped</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Delivered</div>
                            </a>
                            @elseif($track->status == 'confirmed')
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Pending</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Confirmed</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Processing</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order PickedUp</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Shipped</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Delivered</div>
                            </a>
                            @elseif($track->status == 'processing')
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Pending</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Confirmed</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Processing</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order PickedUp</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Shipped</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Delivered</div>
                            </a>
                            @elseif($track->status == 'pickedup')
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Pending</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Confirmed</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Processing</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order PickedUp</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Shipped</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Delivered</div>
                            </a>
                            @elseif($track->status == 'shipped')
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Pending</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Confirmed</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Processing</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order PickedUp</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Shipped</div>
                            </a>
                            <a class="step-item" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Delivered</div>
                            </a>
                            @elseif($track->status == 'delivered')
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Pending</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Confirmed</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Processing</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order PickedUp</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Shipped</div>
                            </a>
                            <a class="step-item active" href="javascript:;">
                                <div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
                                </div>
                                <div class="step-label">Order Delivered</div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection