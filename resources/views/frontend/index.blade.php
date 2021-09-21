@extends('frontend.main_master')
@section('content')
@include('frontend.body.slider')

<div class="page-content">
    <!--start information-->
    <section class="py-3 border-top border-bottom">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center p-3 bg-white">
                        <div class="fs-1"><i class='bx bx-taxi'></i>
                        </div>
                        <div class="info-box-content ps-3">
                            <h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>
                            <p class="mb-0">Free shipping on all orders over $49</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center p-3 bg-white">
                        <div class="fs-1"><i class='bx bx-dollar-circle'></i>
                        </div>
                        <div class="info-box-content ps-3">
                            <h6 class="mb-0">MONEY BACK GUARANTEE</h6>
                            <p class="mb-0">100% money back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center p-3 bg-white">
                        <div class="fs-1"><i class='bx bx-support'></i>
                        </div>
                        <div class="info-box-content ps-3">
                            <h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
                            <p class="mb-0">Awesome Support for 24/7 Days</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end information-->
    <!--start pramotion-->
    <section class="py-4">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                @php
                $categories = App\Models\Category::orderBy('category_name', 'DESC')->limit(3)->get();
                @endphp
                @foreach($categories as $category)
                <div class="col">
                    <div class="card rounded-0 border shadow-none">
                        <div class="row g-0 align-items-center">
                            <div class="col">
                                <img src="{{asset($category->category_image)}}" class="img-fluid" alt="" />
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">{{$category->category_name}}'s Wear</h5>
                                    <p class="card-text text-uppercase">Starting at $9</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end pramotion-->
    <!--start Featured product-->
    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
                <a href="{{route('featured.view')}}" class="btn btn-dark btn-ecomm ms-auto rounded-0">More Products<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr />
            <div class="product-grid">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    @foreach($featured as $product)
                    <div class="col">
                        <div class="card rounded-0 product-card">
                            <a href="{{url('product/details/' .$product->id)}}">
                                <img src="{{asset($product->product_thumbnail)}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="product-info">
                                    <a href="{{url('product/details/' .$product->id)}}">
                                        <h6 class="product-name mb-2">{{$product->product_name}}</h6>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 product-price"><span class="me-1 text-decoration-line-through">{{$product->selling_price}}$</span>
                                            <span class="fs-5">{{$product->discount_price}}$</span>
                                        </div>
                                        @php
                                        $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        @endphp
                                        <div class="cursor-pointer ms-auto">
                                            @if($avarage == 0)
                                            No Rating Yet!
                                            @elseif($avarage == 1 || $avarage < 2) <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif ($avarage == 2 || $avarage < 3) <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    @elseif ($avarage == 3 || $avarage < 4) <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        @elseif ($avarage == 4 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif ($avarage == 5 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                @endif
                                        </div>
                                    </div>
                                    <div class="product-action mt-2">
                                        <div class="d-grid gap-2">
                                            <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
                                            <a href="javascript:;" class="btn btn-light btn-ecomm" id="{{$product->id}}" onclick="addToWishlist(this.id)"><i class='bx bx-heart'></i>Add to Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--end row-->
            </div>

        </div>
    </section>
    <!--end Featured product-->
    <!--start New Arrivals-->
    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">Hot Deals</h5>
                <a href="{{route('hot.deals')}}" class="btn btn-dark ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr />
            <div class="product-grid">
                <div class="new-arrivals owl-carousel owl-theme">
                    @foreach($hot_deals as $product)
                    <div class="item">
                        <div class="card rounded-0 product-card">

                            <a href="{{url('product/details/' .$product->id)}}">
                                <img src="{{asset($product->product_thumbnail)}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="product-info">
                                    <a href="{{url('product/details/' .$product->id)}}">
                                        <h6 class="product-name mb-2">{{$product->product_name}}</h6>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">{{$product->selling_price}}$</span>
                                            <span class="fs-5">{{$product->discount_price}}$</span>
                                        </div>
                                        @php
                                        $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        @endphp
                                        <div class="cursor-pointer ms-auto">
                                            @if($avarage == 0)
                                            No Rating Yet!
                                            @elseif($avarage == 1 || $avarage < 2) <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif ($avarage == 2 || $avarage < 3) <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    @elseif ($avarage == 3 || $avarage < 4) <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        @elseif ($avarage == 4 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif ($avarage == 5 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                @endif
                                        </div>
                                    </div>
                                    <div class="product-action mt-2">
                                        <div class="d-grid gap-2">
                                            <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
                                            <a href="javascript:;" class="btn btn-light btn-ecomm" id="{{$product->id}}" onclick="addToWishlist(this.id)"><i class='bx bx-heart'></i>Add to Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!--end New Arrivals-->

    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">Special Deals</h5>
                <a href="{{route('special.deals')}}" class="btn btn-dark ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr />
            <div class="product-grid">
                <div class="new-arrivals owl-carousel owl-theme">
                    @foreach($special_deals as $product)
                    <div class="item">
                        <div class="card rounded-0 product-card">

                            <a href="{{url('product/details/' .$product->id)}}">
                                <img src="{{asset($product->product_thumbnail)}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <div class="product-info">
                                    <a href="{{url('product/details/' .$product->id)}}">
                                        <h6 class="product-name mb-2">{{$product->product_name}}</h6>
                                    </a>
                                    <div class="d-flex align-items-center">

                                        <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">{{$product->selling_price}}$</span>
                                            <span class="fs-5">{{$product->discount_price}}$</span>
                                        </div>
                                        @php
                                        $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        @endphp
                                        <div class="cursor-pointer ms-auto">
                                            @if($avarage == 0)
                                            No Rating Yet!
                                            @elseif($avarage == 1 || $avarage < 2) <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif ($avarage == 2 || $avarage < 3) <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    @elseif ($avarage == 3 || $avarage < 4) <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        @elseif ($avarage == 4 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif ($avarage == 5 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                @endif
                                        </div>
                                    </div>
                                    <div class="product-action mt-2">
                                        <div class="d-grid gap-2">
                                            <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
                                            <a href="javascript:;" class="btn btn-light btn-ecomm" id="{{$product->id}}" onclick="addToWishlist(this.id)"><i class='bx bx-heart'></i>Add to Wishlist</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--end special offer-->
    <!--start Advertise banners-->
    <section class="py-4">
        <div class="container">
            <div class="add-banner">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100 border shadow-none">
                            <img src="{{asset('frontend/assets/images/promo/04.png')}}" class="card-img-top" alt="...">
                            <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Sunglasses Sale</h5>
                                <p class="card-text">See all Sunglasses and get 10% off at all Sunglasses</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">SHOP BY GLASSES</a>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100 border shadow-none">
                            <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-80%</span>
                            </div>
                            <div class="card-body text-center mt-5">
                                <h5 class="card-title">Cosmetics Sales</h5>
                                <p class="card-text">Buy Cosmetics products and get 30% off at all Cosmetics</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">SHOP BY COSMETICS</a>
                            </div>
                            <img src="{{asset('frontend/assets/images/promo/08.png')}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100 border shadow-none">
                            <img src="{{asset('frontend/assets/images/promo/06.png')}}" class="card-img h-100" alt="...">
                            <div class="card-img-overlay text-center top-20">
                                <div class="border border-white border-3 py-3 bg-dark-3">
                                    <h5 class="card-title text-white">Fashion Summer Sale</h5>
                                    <p class="card-text text-uppercase fs-1 lh-1 mt-3 mb-2 text-white">Up to 80% off</p>
                                    <p class="card-text fs-5 text-white">On top Fashion Brands</p> <a href="javascript:;" class="btn btn-white btn-ecomm">SHOP BY FASHION</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card rounded-0 w-100 border shadow-none">
                            <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-50%</span>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{asset('frontend/assets/images/promo/07.png')}}" class="card-img-top" alt="...">
                                <h5 class="card-title fs-1 text-uppercase">Super Sale</h5>
                                <p class="card-text text-uppercase fs-4 lh-1 mb-2">Up to 50% off</p>
                                <p class="card-text">On All Electronic</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">HURRY UP!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end Advertise banners-->
    <!--start categories-->
    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">Browse Catergory</h5>
                <a href="{{route('product.categories')}}" class="btn btn-dark ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
            </div>
            <hr />
            <div class="product-grid">
                <div class="browse-category owl-carousel owl-theme">
                    @php
                    $categories = App\Models\Category::orderBy('category_name', 'DESC')->limit(6)->get();
                    @endphp
                    @foreach($categories as $category)
                    <div class="item">
                        <div class="card rounded-0 product-card border">
                            <div class="card-body">
                                <img src="{{asset($category->category_image)}}" class="img-fluid" alt="...">
                            </div>
                            <div class="card-footer text-center">
                                <h6 class="mb-1 text-uppercase">{{$category->category_name}}</h6>
                                <p class="mb-0 font-12 text-uppercase">10 Products</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--end categories-->
    <!--start support info-->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
                <div class="col">
                    <div class="text-center">
                        <div class="font-50"> <i class='bx bx-cart'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>
                        <p class="text-capitalize">Free delivery over $199</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50"> <i class='bx bx-credit-card'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
                        <p class="text-capitalize">We possess SSL / Secure сertificate</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50"> <i class='bx bx-dollar-circle'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Free returns</h2>
                        <p class="text-capitalize">We return money within 30 days</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <div class="font-50"> <i class='bx bx-support'></i>
                        </div>
                        <h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
                        <p class="text-capitalize">Friendly 24/7 customer support</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end support info-->

    <!--start brands-->
    @include('frontend.body.brands')
    <!--end brands-->
</div>
@endsection