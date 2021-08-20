<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('frontend/assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('frontend/assets/plugins/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('frontend/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('frontend/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/icons.css')}}" rel="stylesheet">
    <title>Shopingo - eCommerce HTML Template</title>

</head>

<body>

    <b class="screen-overlay"></b>
    <!--wrapper-->
    <div class="wrapper">
        @include('frontend.body.header')
        <!--end top header wrapper-->
        <!--start slider section-->
        <!--end slider section-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!--end page wrapper -->
        <!--start footer section-->
        @include('frontend.body.footer')
        <!--end footer section-->
        <!--start quick view product-->
        <!-- Modal -->


        <!--end quick view product-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('frontend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('frontend/assets/plugins/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/price-slider.js')}}"></script>
    <script src="{{asset('frontend/assets/js/product-gallery.js')}}"></script>
    <!--app JS-->
    <script src="{{asset('frontend/assets/js/app.js')}}"></script>
    <script src="{{asset('frontend/assets/js/index.js')}}"></script>
    <script src="{{asset('frontend/assets/js/show-hide-password.js')}}"></script>

</body>

</html>