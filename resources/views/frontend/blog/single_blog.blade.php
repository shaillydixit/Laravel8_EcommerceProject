@extends('frontend.main_master')
@section('content')

<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Single Post</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start page content-->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="blog-right-sidebar p-3">
                        <div class="card shadow-none bg-transparent">
                            <img src="{{asset($blogpost->post_image)}}" class="card-img-top" alt="">
                            <div class="card-body p-0">
                                <div class="list-inline mt-4"> <a href="javascript:;" class="list-inline-item"><i class='bx bx-user me-1'></i>Shailly Dixit</a>
                                    <a href="javascript:;" class="list-inline-item"><i class='bx bx-comment-detail me-1'></i>16 Comments</a>
                                    <a href="javascript:;" class="list-inline-item"><i class='bx bx-calendar me-1'></i>{{Carbon\Carbon::parse($blogpost->created_at)->diffForHumans()}}</a>
                                </div>
                                <h4 class="mt-4">{{$blogpost->post_title}}</h4>
                                <p>{!!$blogpost->post_details!!}</p>
                                <div class="d-flex align-items-center gap-2 py-4 border-top border-bottom">
                                    <div class="">
                                        <h6 class="mb-0 text-uppercase">Share This Post</h6>
                                    </div>
                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_lv5b"></div>
                                </div>
                                <div class="author d-flex align-items-center gap-3 py-4">
                                    <img src="assets/images/avatars/avatar-1.png" alt="" width="80">
                                    <div class="">
                                        <h6 class="mb-0">shailly</h6>
                                        <p class="mb-0">Donec egestas metus non vehicula accumsan. Pellentesque sit amet tempor nibh. Mauris in risus lorem. Cras malesuada gravida massa eget viverra. Suspendisse vitae dolor erat. Morbi id rhoncus enim. In hac habitasse platea dictumst. Aenean lorem diam, venenatis nec venenatis id, adipiscing ac massa.</p>
                                    </div>
                                </div>
                                <div class="reply-form p-4 border bg-dark-1">
                                    <h6 class="mb-0">Leave a Reply</h6>
                                    <form action="{{route('blog.comment')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Comment</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-light btn-ecomm">Post Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="product-grid">
                            <h5 class="text-uppercase mb-4">Latest Post</h5>
                            <div class="latest-news owl-carousel owl-theme">
                                @foreach($blogpostt as $post)
                                <div class="item">
                                    <div class="card rounded-0 product-card border">
                                        <div class="news-date">
                                            <div class="date-number">24</div>
                                            <div class="date-month">FEB</div>
                                        </div>
                                        <a href="javascript:;">
                                            <img src="{{asset($post->post_image)}}" class="card-img-top border-bottom bg-dark-1" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <div class="news-title">
                                                <a href="javascript:;">
                                                    <h5 class="mb-3 text-capitalize">{{$post->post_title}}</h5>
                                                </a>
                                            </div>
                                            <p class="news-content mb-0">{!! Str::limit($post->post_details, 100)!!}</p>
                                        </div>
                                        <div class="card-footer border-top">
                                            <a href="javascript:;">
                                                <p class="mb-0"><small class="text-white">0 Comments</small>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
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
                                    <a href="javascript:;" class="list-group-item bg-transparent"><i class='bx bx-chevron-right me-1'></i> {{$category->blog_category_name}}</a>
                                </div>
                                @endforeach
                            </div>
                            <div class="blog-categories recent-post mb-3">
                                <h5 class="mb-4">Recent Posts</h5>
                                @foreach($blogpostt as $post)
                                <div class="d-flex align-items-center">
                                    <img src="{{asset($post->post_image)}}" width="75" alt="">
                                    <div class="ms-3"> <a href="javascript:;" class="fs-6 recent-post-title">{{$post->post_title}}</a>
                                        <p class="mb-0">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                                    </div>
                                </div>
                                <br>
                                @endforeach
                            </div>
                            <br>
                            <div class="blog-categories mb-3">
                                <div class="tags-box">
                                    @include('frontend.product.product_tags')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end start page content-->
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-613d309a16b19820"></script>
@endsection