@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
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
                        <div class="checkout-payment">
                            <div class="card bg-transparent rounded-0 shadow-none">
                                <div class="card-body">
                                    <div class="steps steps-light">
                                        <a class="step-item active" href="shop-cart.html">
                                            <div class="step-progress"><span class="step-count">1</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                        </a>
                                        <a class="step-item active" href="checkout-details.html">
                                            <div class="step-progress"><span class="step-count">2</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
                                        </a>
                                        <a class="step-item active current" href="checkout-payment.html">
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
                            <div class="card rounded-0 shadow-none">
                                <div class="card-header border-bottom">
                                    <h2 class="h5 my-2">Choose Payment Method</h2>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3 border p-3" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link rounded-0" data-bs-toggle="pill" href="#stripe" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon"><i class='bx bx-mobile font-18 me-1'></i>
                                                    </div>
                                                    <div class="tab-title">Stripe Payment</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">   
                                        <div class="tab-pane fade" id="stripe" role="tabpanel">
                                            <div class="p-3 border">

                                                <form action="{{route('stripe.order')}}" method="post" id="payment-form">
                                                    @csrf
                                                    <div class="form-row">
                                                        <label for="card-element">
                                                            <input type="hidden" name="first_name" value="{{$data['first_name']}}">
                                                            <input type="hidden" name="last_name" value="{{$data['last_name']}}">
                                                            <input type="hidden" name="shipping_email" value="{{$data['shipping_email']}}">
                                                            <input type="hidden" name="shipping_phone" value="{{$data['shipping_phone']}}">
                                                            <input type="hidden" name="shipping_zipcode" value="{{$data['shipping_zipcode']}}">
                                                            <input type="hidden" name="shipping_address" value="{{$data['shipping_address']}}">
                                                            <input type="hidden" name="shipping_landmark" value="{{$data['shipping_landmark']}}">
                                                            <input type="hidden" name="division_id" value="{{$data['division_id']}}">
                                                            <input type="hidden" name="district_id" value="{{$data['district_id']}}">
                                                            <input type="hidden" name="state_id" value="{{$data['state_id']}}">
                                                        </label>

                                                        <div id="card-element">
                                                            <!-- A Stripe Element will be inserted here. -->
                                                        </div>
                                                        <!-- Used to display form errors. -->
                                                        <div id="card-errors" role="alert"></div>
                                                    </div>
                                                    <br>
                                                    <button class="btn btn-primary">Submit Payment</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0 shadow-none">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="d-grid"> <a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-chevron-left"></i>Back to Shipping</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-grid"> <a href="javascript:;" class="btn btn-white btn-ecomm">Review Your Order<i class="bx bx-chevron-right"></i></a>
                                            </div>
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
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>

<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51JMnjqSCHbQQxw8mMpuBkWFwO5yrjkSaK78pqyQMCRI7udPWiyaDouDc0oqVWQDsnhLkyIVMHYKJIymkigt3l4fh00BGa67qRS ');
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>

@endsection