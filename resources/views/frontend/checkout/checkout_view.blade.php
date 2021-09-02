@extends('frontend.main_master')
@section('content')
<br>
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Checkout</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
            <div class="shop-cart">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="checkout-details">
                            <div class="card bg-transparent rounded-0 shadow-none">
                                <div class="card-body">
                                    <div class="steps steps-light">
                                        <a class="step-item active" href="shop-cart.html">
                                            <div class="step-progress"><span class="step-count">1</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                        </a>
                                        <a class="step-item active current" href="checkout-details.html">
                                            <div class="step-progress"><span class="step-count">2</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
                                        </a>
                                        <a class="step-item" href="checkout-shipping.html">
                                            <div class="step-progress"><span class="step-count">3</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
                                        </a>
                                        <a class="step-item" href="checkout-payment.html">
                                            <div class="step-progress"><span class="step-count">4</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
                                        </a>
                                        <a class="step-item" href="checkout-review.html">
                                            <div class="step-progress"><span class="step-count">5</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="order-summary">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <!-- @if(Session::has('coupan'))

                                    @else
                                    <div class="card rounded-0 border bg-transparent shadow-none" id="coupanField">
                                        <div class="card-body">
                                            <p class="fs-5">Apply Discount Code</p>
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-0" placeholder="Enter discount code" id="coupan_name">
                                                <button class="btn btn-dark btn-ecomm" type="button" onclick="applyCoupan()">Apply Discount</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif -->
                                    <div class="card rounded-0 border bg-transparent shadow-none">
                                        <div class="card-body">
                                            <p class="fs-5">Order summary</p>
                                            <div class="my-3 border-top"></div>
                                            @foreach($carts as $item)
                                            <div class="d-flex align-items-center">
                                                <a class="d-block flex-shrink-0" href="javascript:;">
                                                    <img src="{{asset($item->options->image)}}" style="height: 50px; width: 50px;" alt="Product">
                                                </a>
                                                <div class="ps-2">
                                                    <h6 class="mb-1"><a href="javascript:;" class="text-dark">{{$item->name}}</a></h6>
                                                    <div class="widget-product-meta"><span class="me-2">{{$item->price}}</span><span class="">x {{$item->qty}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                        <div class="card-body">
                                            @if(Session::has('coupan'))
                                            <p class="mb-2">Subtotal: <span class="float-end">${{$cartTotal}}</span>
                                            </p>
                                            <p class="mb-2">Shipping: <span class="float-end">Free</span>
                                            </p>
                                            <p class="mb-2">Coupon: <span class="float-end">{{session()->get('coupan')['coupan_name']}}
                                                    ({{session()->get('coupan')['coupan_discount']}}%)
                                                </span>
                                            </p>
                                            <p class="mb-0">Discount: <span class="float-end">${{session()->get('coupan')['discount_amount']}}</span>
                                            </p>
                                            <div class="my-3 border-top"></div>
                                            <h5 class="mb-0">Order Total: <span class="float-end">${{session()->get('coupan')['total_amount']}}</span></h5>

                                            @else
                                            <p class="mb-2">Subtotal: <span class="float-end">${{$cartTotal}}</span>
                                            </p>
                                            <p class="mb-2">Shipping: <span class="float-end">Free</span>
                                            </p>
                                            <div class="my-3 border-top"></div>
                                            <h5 class="mb-0">Order Total: <span class="float-end">${{$cartTotal}}</span></h5>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection