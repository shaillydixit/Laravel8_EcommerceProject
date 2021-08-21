@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">{{$product->product_name}}</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start product detail-->
    <section class="py-4">
        <div class="container">
            <div class="product-detail-card">
                <div class="product-detail-body">
                    <div class="row g-0">
                        <div class="col-12 col-lg-5">
                            <div class="image-zoom-section">
                                <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                    @foreach($multiImg as $img)
                                    <div class="item">
                                        <img src="{{asset($img->photo_name)}}" class="img-fluid" alt="">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                    @foreach($multiImg as $img)
                                    <button class="owl-thumb-item">
                                        <img src="{{asset($img->photo_name)}}" class="" alt="">
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <div class="product-info-section p-3">
                                <h3 class="mt-3 mt-lg-0 mb-0">{{$product->product_name}}</h3>
                                <div class="product-rating d-flex align-items-center mt-2">
                                    <div class="rates cursor-pointer font-13"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-light-4"></i>
                                    </div>
                                    <div class="ms-1">
                                        <p class="mb-0">(24 Ratings)</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3 gap-2">
                                    <h5 class="mb-0 text-decoration-line-through text-light-3">${{$product->selling_price}}</h5>
                                    <h4 class="mb-0">${{$product->discount_price}}</h4>
                                </div>
                                <div class="mt-3">
                                    <h6>Discription :</h6>
                                    <p class="mb-0">{!!$product->short_description!!}</p>
                                </div>
                                <dl class="row mt-3">
                                    <dt class="col-sm-3">Product id</dt>
                                    <dd class="col-sm-9">{{$product->product_code}}</dd>
                                </dl>
                                <div class="row row-cols-auto align-items-center mt-3">
                                    <div class="col">
                                        <label class="form-label">Quantity</label>
                                        <select class="form-select form-select-sm">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Size</label>
                                        <select class="form-select form-select-sm">
                                            @foreach($product_size as $size)
                                            <option value="{{$size}}">{{ucwords($size)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Colors</label>
                                        <select class="form-select form-select-sm">
                                            @foreach($product_color as $color)
                                            <option value="{{$color}}">{{ucwords($color)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="d-flex gap-2 mt-3">
                                    <a href="javascript:;" class="btn btn-white btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
                                </div>
                                <hr />
                                <div class="product-sharing">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-linkedin'></i></a>
                                        </li>
                                        <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-instagram'></i></a>
                                        </li>
                                        <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-google'></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </section>
    <!--end product detail-->
    <!--start product more info-->
    <section class="py-4">
        <div class="container">
            <div class="product-more-info">
                <ul class="nav nav-tabs mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#discription" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-title text-uppercase fw-500">Description</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tags" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-title text-uppercase fw-500">Tags</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-title text-uppercase fw-500">(3) Reviews</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="discription" role="tabpanel">
                        <p>{!!$product->long_description!!}</p>
                    </div>

                    <div class="tab-pane fade" id="tags" role="tabpanel">
                        <div class="tags-box w-50"> <a href="javascript:;" class="tag-link">Cloths</a>
                            <a href="javascript:;" class="tag-link">{{$product->product_tags}}</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col col-lg-8">
                                <div class="product-review">
                                    <h5 class="mb-4">3 Reviews For The Product</h5>
                                    <div class="review-list">
                                        <div class="d-flex align-items-start">
                                            <div class="review-user">
                                                <img src="{{asset('')}}frontend/assets/images/avatars/avatar-1.png" width="65" height="65" class="rounded-circle" alt="" />
                                            </div>
                                            <div class="review-content ms-3">
                                                <div class="rates cursor-pointer fs-6"> <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0">James Caviness</h6>
                                                    <p class="mb-0 ms-auto">February 16, 2021</p>
                                                </div>
                                                <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="d-flex align-items-start">
                                            <div class="review-user">
                                                <img src="{{asset('')}}frontend/assets/images/avatars/avatar-2.png" width="65" height="65" class="rounded-circle" alt="" />
                                            </div>
                                            <div class="review-content ms-3">
                                                <div class="rates cursor-pointer fs-6"> <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0">David Buckley</h6>
                                                    <p class="mb-0 ms-auto">February 22, 2021</p>
                                                </div>
                                                <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="d-flex align-items-start">
                                            <div class="review-user">
                                                <img src="{{asset('')}}frontend/assets/images/avatars/avatar-3.png" width="65" height="65" class="rounded-circle" alt="" />
                                            </div>
                                            <div class="review-content ms-3">
                                                <div class="rates cursor-pointer fs-6"> <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0">Peter Costanzo</h6>
                                                    <p class="mb-0 ms-auto">February 26, 2021</p>
                                                </div>
                                                <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-4">
                                <div class="add-review bg-dark-1">
                                    <div class="form-body p-3">
                                        <h4 class="mb-4">Write a Review</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Your Name</label>
                                            <input type="text" class="form-control rounded-0">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Your Email</label>
                                            <input type="text" class="form-control rounded-0">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Rating</label>
                                            <select class="form-select rounded-0">
                                                <option selected>Choose Rating</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="3">4</option>
                                                <option value="3">5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Example textarea</label>
                                            <textarea class="form-control rounded-0" rows="3"></textarea>
                                        </div>
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-light btn-ecomm">Submit a Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end product more info-->
    <!--start similar products-->

    <section class="py-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <h5 class="text-uppercase mb-0">Similar Products</h5>
                <div class="d-flex align-items-center gap-0 ms-auto"> <a href="javascript:;" class="owl_prev_item fs-2"><i class='bx bx-chevron-left'></i></a>
                    <a href="javascript:;" class="owl_next_item fs-2"><i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
            <hr />
            <div class="product-grid">
                <div class="new-arrivals owl-carousel owl-theme">
                    @foreach($similar_product as $product)
                    <div class="item">
                        <div class="card rounded-0 product-card">
                            <div class="card-header bg-transparent border-bottom-0">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="javascript:;">
                                        <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
                                        <div class="cursor-pointer ms-auto"> <span>5.0</span> <i class="bx bxs-star text-white"></i>
                                        </div>
                                    </div>
                                    <div class="product-action mt-2">
                                        <div class="d-grid gap-2">
                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
                                            <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
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

    @include('frontend.body.brands')
    <!--end similar products-->
</div>
@endsection