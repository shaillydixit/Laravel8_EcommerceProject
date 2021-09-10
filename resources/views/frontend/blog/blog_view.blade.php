@extends('frontend.main_master')
@section('content')
<div class="page-content">

    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <div class="breadcrumb-title pe-3">Blog</div>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="blog-right-sidebar p-3">
                        @foreach($blogpost as $post)
                        <div class="card mb-4">
                            <img src="{{asset($post->post_image)}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <div class="list-inline"> <a href="javascript:;" class="list-inline-item"><i class='bx bx-user me-1'></i>Shailly Dixit</a>
                                    <a href="javascript:;" class="list-inline-item"><i class='bx bx-calendar me-1'></i>{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</a>
                                </div>
                                <h4 class="mt-4">{{$post->post_title}}</h4>
                                <p>{!! Str::limit($post->post_details, 200)!!}</p>
                                <a href="{{route('single.blog', $post->id)}}" class="btn btn-dark btn-ecomm">Read More <i class='bx bx-chevrons-right'></i></a>
                            </div>
                        </div>
                        @endforeach
                        <hr>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="blog-left-sidebar p-3">
                        <form>
                            <div class="position-relative blog-search mb-3">
                                <input type="text" class="form-control form-control-lg rounded-0 pe-5" placeholder="Serach posts here...">
                                <div class="position-absolute top-50 end-0 translate-middle"><i class='bx bx-search fs-4 text-white'></i>
                                </div>
                            </div>
                            <div class="blog-categories mb-3">
                                <h5 class="mb-4">Blog Categories</h5>
                                @foreach($blogcategory as $category)
                                <div class="list-group list-group-flush">
                                    <a href="{{('/blog/category/post/' .$category->id)}}" class="list-group-item bg-transparent"><i class='bx bx-chevron-right me-1'></i> {{$category->blog_category_name}}</a>
                                </div>
                                @endforeach
                            </div>
                            <div class="blog-categories recent-post mb-3">
                                <h5 class="mb-4">Recent Posts</h5>
                                @foreach($blogpost as $post)
                                <div class="d-flex align-items-center">
                                    <img src="{{asset($post->post_image)}}" width="75" alt="">
                                    <div class="ms-3"> <a href="javascript:;" class="fs-6 recent-post-title">{{$post->post_title}}</a>
                                        <p class="mb-0">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="blog-categories mb-3">
                                <div class="tags-box">
                                    @include('frontend.product.product_tags')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection