@extends('frontend.main_master')
@section('content')
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

                                        <a class="step-item" href="checkout-payment.html">
                                            <div class="step-progress"><span class="step-count">3</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
                                        </a>
                                        <a class="step-item" href="checkout-review.html">
                                            <div class="step-progress"><span class="step-count">4</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="">
                                            <img src="{{asset('frontend/assets/images/avatars/avatar-1.png')}}" width="90" alt="" class="rounded-circle p-1 border">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0">{{Auth::user()->name}}</h6>
                                            <p class="mb-0">{{Auth::user()->email}}</p>
                                        </div>

                                    </div>
                                    <div class="border p-3">
                                        <h2 class="h5 mb-0">Shipping Address</h2>
                                        <div class="my-3 border-bottom"></div>
                                        <div class="form-body">
                                            <form class="row g-3" action="{{route('checkout.storedata')}}" method="POST">
                                                @csrf
                                                <div class="col-md-6">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="first_name" id="first_name" class="form-control rounded-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" name="last_name" id="last_name" class="form-control rounded-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">E-mail id</label>
                                                    <input type="email" name="shipping_email" id="shipping_email" class="form-control rounded-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="text" name="shipping_phone" id="shipping_phone" class="form-control rounded-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Divison</label>
                                                    <select class="form-select rounded-0" name="division_id" id="division_id">
                                                        <option value="" selected="" disabled="">Select Country</option>
                                                        @foreach($divisons as $item)
                                                        <option value="{{$item->id}}">{{$item->division_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">District</label>
                                                    <select class="form-select rounded-0" name="district_id" id="district_id">
                                                        <option value="" selected="" disabled="">Select District</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">State/Province</label>
                                                    <select class="form-select rounded-0" name="state_id" id="state_id">
                                                        <option value="" selected="" disabled="">Select State</option>
                                                        @foreach($states as $item)
                                                        <option value="{{$item->id}}">{{$item->state_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">Zip/Postal Code</label>
                                                    <input type="text" name="shipping_zipcode" id="shipping_zipcode" class="form-control rounded-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Address 1</label>
                                                    <textarea class="form-control rounded-0" name="shipping_address" id="shipping_address"></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Address 2</label>
                                                    <textarea class="form-control rounded-0" name="shipping_landmark" id="shipping_landmark"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="mb-0 h5">Select Payment Method</h6>
                                                    <hr>
                                                    <div class="input-group text-center">
                                                        <div class="col-md-3">
                                                            <label for="">Stripe</label>
                                                            <input type="radio" name="payment_method" value="stripe">
                                                            <br>
                                                            <img src="{{ asset('frontend/assets/images/payment/1.jpeg') }}" style="width:80px; height:60px;">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Razorpay</label>
                                                            <input type="radio" name="payment_method" value="razorpay">
                                                            <br>
                                                            <img src="{{ asset('frontend/assets/images/payment/4.jpeg') }}" style="width:70px; height:50px;">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="">Card</label>
                                                            <input type="radio" name="payment_method" value="card">
                                                            <br>
                                                            <img src="{{ asset('frontend/assets/images/payment/2.jpeg') }}" style="width:70px; height:50px;">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for="">Cash</label>
                                                            <input type="radio" name="payment_method" value="cash">
                                                            <br>
                                                            <img src="{{ asset('frontend/assets/images/payment/3.jpeg') }}" style="width:70px; height:50px;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="d-grid"> <a href="{{ route('mycart') }}" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-grid"> <button type="submit" class="btn btn-dark btn-ecomm">Proceed to Checkout<i class='bx bx-chevron-right'></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="order-summary">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    @if(Session::has('coupan'))

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
                                    @endif
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
                                    <br><br>



                                </div>
                            </div>

                        </div>
                    </div>
    </section>
    <!--end shop cart-->
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{  url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' +
                                value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection