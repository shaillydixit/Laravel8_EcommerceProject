@extends('frontend.main_master')
@section('content')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Shop Categories</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Categories</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop categories-->
    <section class="py-4">
        <div class="container">
            <div class="product-categories">
                <div class="row row-cols-1 row-cols-lg-4 g-4">
                    @foreach($categories as $category)
                    <div class="col">
                        <div class="card rounded-0 product-card">
                            <a href="javascript:;">
                                <img src="{{asset($category->category_image)}}" class="card-img-top border-bottom bg-dark-1" alt="...">
                            </a>
                            <div class="list-group list-group-flush">
                                <a href="javascript:;" class="list-group-item bg-transparent">
                                    <h6 class="mb-0 text-uppercase">{{$category->category_name}}</h6>
                                    @php
                                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                    @endphp
                                    @foreach($subcategories as $subcategory)
                                </a> <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                    {{$subcategory->subcategory_name}}
                                    <span class="badge bg-primary rounded-pill">14</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end shop categories-->
    <!--start brand-->
    <section class="py-4">
        <div class="container">
            <div class="popular-brands">
                <div class="text-center">
                    <h2 class="text-uppercase mb-0">Popular Brands</h2>
                    <hr>
                </div>
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5 g-4">
                    @foreach($brands as $brand)
                    <div class="col">
                        <div class="card shadow-none border">
                            <div class="card-body">
                                <a href="javscript:;">
                                    <img src="{{asset($brand->brand_image)}}" class="img-fluid" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end brand-->
</div>
@endsection