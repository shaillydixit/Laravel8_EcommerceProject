@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->

    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">FEATURED PRODUCTS</h3>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop area-->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="product-wrapper">
                        <div class="product-grid">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                @foreach($product as $row)
                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        <a href="{{url('product/details/' .$row->id)}}">
                                            <img src="{{asset($row->product_thumbnail)}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="javascript:;">
                                                    <p class="product-catergory font-13 mb-1">{{$row->category->category_name}}</p>
                                                </a>
                                                <a href="{{url('product/details/' .$row->id)}}">
                                                    <h6 class="product-name mb-2">{{$row->product_name}}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">₹{{$row->selling_price}}</span>
                                                        <span class="fs-5">₹{{$row->discount_price}}</span>
                                                    </div>
                                                    <div class="cursor-pointer ms-auto">
                                                        @php
                                                        $avarage = App\Models\Review::where('product_id',$row->id)->where('status',1)->avg('rating');
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
                                                </div>
                                                <div class="product-action mt-2">
                                                    <div class="d-grid gap-2">
                                                        <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$row->id}}" onclick="productView(this.id)"> <i class="bx bxs-cart-add"></i>Add to Cart</a>
                                                        <a href="javascript:;" class="btn btn-light btn-ecomm" id="{{$row->id}}" onclick="addToWishlist(this.id)"><i class='bx bx-heart'></i>Add to Wishlist</a>
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
                        {{ $product->links('vendor.pagination.custom')  }}
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end shop area-->
</div>
@endsection