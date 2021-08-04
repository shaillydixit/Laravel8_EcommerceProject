<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/plugins/images/favicon.png')}}">
    <title>Cubic Admin Template</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{asset('backend/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="{{asset('backend/plugins/components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('backend/plugins/components/fullcalendar/fullcalendar.css')}}" rel='stylesheet'>

    <!-- ===== Animation CSS ===== -->
    <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="{{asset('backend/css/colors/green-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        @include('admin.main.header')
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        @include('admin.main.sidebar')
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div class="page-wrapper">
            <!-- ===== Page-Container ===== -->
            @yield('content')
            <!-- ===== Page-Container-End ===== -->
            @include('admin.main.footer')
        </div>
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="{{asset('backend/plugins/components/jquery/dist/jquery.min.js')}}"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="{{asset('backend/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="{{asset('backend/js/waves.js')}}"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="{{asset('backend/js/sidebarmenu.js')}}"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <!-- ===== Plugin JS ===== -->
    <script src="{{asset('backend/plugins/components/chartist-js/dist/chartist.min.js')}}"></script>
    <script src="{{asset('backend/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('backend/plugins/components/moment/moment.js')}}"></script>
    <script src="{{asset('backend/plugins/components/fullcalendar/fullcalendar.js')}}"></script>
    <script src="js/db2.js"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="{{asset('backend/plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>

</html>