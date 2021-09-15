@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            @foreach($product as $item)
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">{{$item->category->category_name}}</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">{{$item->category->category_name}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$item->subcategory->subcategory_name}}</li>
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
                <div class="col-12 col-xl-12">
                    <div class="product-wrapper">
                        <div class="toolbox d-lg-flex align-items-center mb-3 gap-2 p-3 bg-white border">
                            <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                <div class="">
                                    <select class="form-select rounded-0">

                                        <option selected="selected">Categories</option>
                                        @foreach($categories as $category)
                                        <option>{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <select class="form-select rounded-0">
                                        <option selected="selected">Brands</option>
                                        @foreach($brands as $brand)
                                        <option>{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <select class="form-select rounded-0">
                                        <option selected="selected">Price</option>
                                        <option>$5 to $49</option>
                                        <option>$49 to $99</option>
                                        <option>$99 to $149</option>
                                        <option>$149 to $300</option>
                                        <option>$300 to $500</option>
                                        <option>Above $1000</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <select class="form-select rounded-0">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-dark rounded-0 text-uppercase">Search</button>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center flex-nowrap">
                                    <p class="mb-0 font-13 text-nowrap text-white">Show:</p>
                                    <select class="form-select ms-3 rounded-0">
                                        <option>9</option>
                                        <option>12</option>
                                        <option>16</option>
                                        <option>20</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>
                            <div> <a href="{{route('product.grid')}}" class="btn btn-dark rounded-0"><i class='bx bxs-grid me-0'></i></a>
                            </div>
                            <div> <a href="{{route('product.list')}}" class="btn btn-light rounded-0"><i class='bx bx-list-ul me-0'></i></a>
                            </div>
                        </div>
                        <div class="product-grid">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                                @foreach($product as $row)
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
                                            <img src="{{asset($row->product_thumbnail)}}" class="card-img-top" alt="..."></a>
                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="javascript:;">
                                                    <p class="product-catergory font-13 mb-1">Catergory Name</p>
                                                </a>
                                                <a href="{{url('product/details/' .$product->id)}}">
                                                    <h6 class="product-name mb-2">{{$row->product_name}}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">${{$row->selling_price}}</span>
                                                        <span class="fs-5">${{$row->discount_price}}</span>
                                                    </div>
                                                    <div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2">
                                                    <div class="d-grid gap-2">
                                                        <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
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
                        <nav class="d-flex justify-content-between" aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
                                </li>
                            </ul>
                            <ul class="pagination">
                                <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
                                </li>
                            </ul>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end shop area-->
</div>
@endsection