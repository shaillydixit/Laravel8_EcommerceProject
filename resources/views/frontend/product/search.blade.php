@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Product Search</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Product</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row">
                <h4><b>Total Search </b><span class="badge badge-danger" style="background: #FF0000;"> {{ count($products) }} </span> Items </h4>
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
                                    <li><a href="{{url('category/product/' .$category->id. '/' .$category->category_slug)}}">{{$category->category_name}}</a>
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
                        <div class="toolbox d-flex align-items-center mb-3 gap-2">
                            <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                <div class="d-flex align-items-center flex-nowrap">
                                    <p class="mb-0 font-13 text-nowrap">Sort By:</p>
                                    <select class="form-select ms-3 rounded-0">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center flex-nowrap">
                                    <p class="mb-0 font-13 text-nowrap">Show:</p>
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
                            <div> <a href="shop-grid-left-sidebar.html" class="btn btn-white rounded-0"><i class='bx bxs-grid me-0'></i></a>
                            </div>
                            <div> <a href="shop-list-left-sidebar.html" class="btn btn-light rounded-0"><i class='bx bx-list-ul me-0'></i></a>
                            </div>
                        </div>
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
                                                    <div class="cursor-pointer ms-auto">
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
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