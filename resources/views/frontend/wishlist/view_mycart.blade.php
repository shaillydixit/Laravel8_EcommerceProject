@extends('frontend.main_master')
@section('content')

@section('title')
My Cart Page
@endsection

<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
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
                        <div class="shop-cart-list mb-3 p-3" id="cartPage">


                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="checkout-form p-3 bg-light">
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
                            <br>
                            <br>
                            <div class="card rounded-0 border bg-transparent mb-0 shadow-none" id="coupanCalculation">

                            </div>
                            <div class="my-4"></div>
                            <div class="d-grid"> <a href="{{route('checkout')}}" type="submit" class="btn btn-dark btn-ecomm">Proceed to Checkout</a>
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