@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            @foreach($breadsubsubcat as $item)
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">{{$item->subsubcategory_name}}</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href=""> {{$item->category->category_name}}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">{{$item->subcategory->subcategory_name}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$item->subsubcategory_name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop area-->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-3">
                    <div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
                    </div>
                    <div class="filter-sidebar d-none d-xl-flex">
                        <div class="card rounded-0 w-100">
                            <div class="card-body">
                                <div class="align-items-center d-flex d-xl-none">
                                    <h6 class="text-uppercase mb-0">Filter</h6>
                                    <div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
                                </div>
                                <hr class="d-flex d-xl-none" />

                                <div class="product-categories">
                                    <h6 class="text-uppercase mb-3">Categories</h6>
                                    @foreach($categories as $category)
                                    <ul class="list-unstyled mb-0 categories-list">
                                        <li><a href="javascript:;">{{$category->category_name}} <span class="float-end badge rounded-pill bg-primary">42</span></a>
                                        </li>
                                    </ul>
                                    @endforeach

                                </div>
                                <hr>
                                <div class="price-range">
                                    <h6 class="text-uppercase mb-3">Price</h6>
                                    <div class="my-4" id="slider"></div>
                                    <div class="d-flex align-items-center">
                                        <button type="button" class="btn btn-dark btn-sm text-uppercase rounded-0 font-13 fw-500">Filter</button>
                                        <div class="ms-auto">
                                            <p class="mb-0">Price: $200.00 - $900.00</p>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="product-brands">
                                    <h6 class="text-uppercase mb-3">Brands</h6>
                                    @foreach($categories as $category)
                                    <ul class="list-unstyled mb-0 categories-list">
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{$category->category_name}}</a>
                                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                                @php
                                                $brands = App\Models\Brand::where('category_id', $category->id)->orderBy('brand_name', 'DESC')->get();
                                                @endphp
                                                @foreach($brands as $brand)
                                                <li><a class="dropdown-item" href="{{url('brand/product/' .$brand->id)}}">{{$brand->brand_name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-9">
                    <div class="product-wrapper">
                        <div class="product-grid">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                                @foreach($products as $product)

                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        <div class="card-header bg-transparent border-bottom-0">
                                            <div class="d-flex align-items-center justify-content-end gap-3">
                                                <a href="javascript:;">
                                                    <div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
                                                    </div>
                                                </a>
                                                <a href="javascript:;">
                                                    <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <a href="{{url('product/details/' .$product->id)}}">
                                            <img src="{{asset($product->product_thumbnail)}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="{{url('product/details/' .$product->id)}}">
                                                    <h6 class="product-name mb-2">{{$product->product_name}}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">${{$product->selling_price}}</span>
                                                        <span class="fs-5">${{$product->discount_price}}</span>
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
                                                        <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="bx bxs-cart-add"></i>Add to Cart</a>
                                                        <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
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
                        <hr>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end shop area-->
</div>


@endsection