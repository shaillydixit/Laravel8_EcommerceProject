@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->

    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            @foreach($breadproduct as $product)
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">{{$product->product_name}}</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;">{{$product->category->category_name}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">{{$product->subcategory->subcategory_name}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @endforeach
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
                                <h3 class="mt-3 mt-lg-0 mb-0" id="pname">{{$product->product_name}}</h3>
                                @php
                                $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                                $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                @endphp
                                <div class="product-rating d-flex align-items-center mt-2">
                                    <div class="rates cursor-pointer font-13">
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
                                    <div class="ms-1">
                                        <p class="mb-0">({{ count($reviewcount) }} Reviews)</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3 gap-2">
                                    <h5 class="mb-0 text-decoration-line-through text-light-3" id="price">${{$product->selling_price}}</h5>
                                    <h4 class="mb-0" id="dprice">${{$product->discount_price}}</h4>
                                </div>
                                <div class="mt-3">
                                    <h6>Discription :</h6>
                                    <p class="mb-0">{!!$product->short_description!!}</p>
                                </div>
                                <dl class="row mt-3">
                                    <dt class="col-sm-3">Product id</dt>
                                    <dd class="col-sm-9" id="pcode">{{$product->product_code}}</dd>
                                </dl>
                                <div class="row row-cols-auto align-items-center mt-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" id="qty" value="1" min="1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        @if($product->product_size == NULL)

                                        @else
                                        <label class="form-label">Size</label>
                                        <select class="form-select form-select-sm" id="size">
                                            @foreach($product_size as $size)
                                            <option value="{{$size}}">{{ucwords($size)}}</option>
                                            @endforeach
                                        </select>
                                        @endif

                                    </div>
                                    <div class="col">
                                        <label class="form-label">Colors</label>
                                        <select class="form-select form-select-sm" id="color">
                                            @foreach($product_color as $color)
                                            <option value="{{$color}}">{{ucwords($color)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="d-flex gap-2 mt-3">
                                    <input type="hidden" id="product_id" value="{{$product->id}}" min="1">
                                    <button type="submit" class="btn btn-white btn-ecomm" onclick="addToCart()"> <i class="bx bxs-cart-add"></i>Add to Cart</button>
                                    <a class="btn btn-light btn-ecomm" id="{{$product->id}}" onclick="addToWishlist(this.id)"><i class="bx bx-heart"></i>Add to Wishlist</a>
                                </div>
                                <br>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_lv5b"></div>
                                <hr />
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </section>
    <!--end product detail-->
    <div>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
    </div>

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
                        <a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-title text-uppercase fw-500">Reviews</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="discription" role="tabpanel">
                        <p>{!!$product->long_description!!}</p>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col col-lg-6">
                                @php
                                $reviews = App\Models\Review::where('product_id', $product->id)->latest()->limit(4)->get();
                                @endphp
                                <h5 class="mb-4">{{count($reviews)}} Reviews For The Product</h5>
                                @foreach($reviews as $item)
                                @if($item->status == 0)
                                @else
                                <div class="d-flex align-items-start">
                                    <div class="review-user">
                                        <img src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" width="65" height="65" class="rounded-circle" alt="" />
                                    </div>

                                    <div class="review-content ms-3">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="mb-0">{{ $item->user->name }}</h6>
                                            <div class="rates cursor-pointer fs-6">
                                                @if($item->rating == NULL)

                                                @elseif($item->rating == 1)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif($item->rating == 2)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif($item->rating == 3)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif($item->rating == 4)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif($item->rating == 5)
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="mb-0 ms-auto">{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p>
                                        <h6>{{$item->comment}}</h6>
                                        <p>{{$item->summary}}</p>
                                    </div>
                                </div>
                                <hr />
                                @endif
                                @endforeach
                            </div>


                            <div class="col col-lg-6">
                                <div class="add-review bg-dark-1">
                                    @guest
                                    <p> <b> For Add Product Review. <br>
                                            You Need to Login First
                                            <a href="{{ route('login') }}">Login Here</a>
                                        </b> </p>
                                    @else
                                    <div class="form-body p-3">
                                        <h4 class="mb-4">Write a Review</h4>
                                        <form action="{{route('review.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="mb-3">
                                                <label class="form-label">Product Rating</label>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell-label">&nbsp;</th>
                                                            <th>1 star</th>
                                                            <th>2 stars</th>
                                                            <th>3 stars</th>
                                                            <th>4 stars</th>
                                                            <th>5 stars</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="cell-label">Product Quality</td>
                                                            <td><input type="radio" name="rating" class="radio" value="1"></td>
                                                            <td><input type="radio" name="rating" class="radio" value="2"></td>
                                                            <td><input type="radio" name="rating" class="radio" value="3"></td>
                                                            <td><input type="radio" name="rating" class="radio" value="4"></td>
                                                            <td><input type="radio" name="rating" class="radio" value="5"></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Your Comment</label>
                                                <input type="text" name="comment" id="comment" class="form-control rounded-0">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Product Summary</label>
                                                <textarea class="form-control rounded-0" rows="3" name="summary" id="summary"></textarea>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-light btn-ecomm">Submit a Review</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
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
                                            <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-613d309a16b19820"></script>
@endsection