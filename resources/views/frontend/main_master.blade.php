<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{csrf_token()}}">
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
        @include('frontend.body.quick_view')

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
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModel"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 10rem;">
                                <img src=" " class="card-img-top" alt="..." style="height: 240px; width: 200px;" id="pimage">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">$<span id="pprice"></span></strong>
                                    <del id="oldprice">$</del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong> </li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong> </li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong> </li>
                                <li class="list-group-item">Stock:
                                    <span class="badge badge-pill badge-success" id="available" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="outofstock" style="background: red; color: white;"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">
                                    <option></option>
                                </select>
                                <div class="form-group">
                                    <label for="size">Choose Size</label>
                                    <select class="form-control" id="size" name="size">
                                        <option></option>
                                    </select>
                                </div> <!-- // end form group -->
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" id="qty" value="1" min="1">
                                </div>
                                <div class="form-group text-center">
                                    <input type="hidden" id="product_id">
                                    <button type="submit" class="btn btn-primary mt-3" onclick="addToCart()">Add to Cart</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            //start product view 
            function productView(id) {
                // alert(id)
                $.ajax({
                    type: 'GET',
                    url: '/product/view/model/' + id,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#pname').text(data.product.product_name);
                        $('#price').text(data.product.selling_price);
                        $('#pcode').text(data.product.product_code);
                        $('#pcategory').text(data.product.category.category_name);
                        $('#pbrand').text(data.product.brand.brand_name);
                        $('#pimage').attr('src', '/' + data.product.product_thumbnail);

                        $('#product_id').val(id)
                        $('#quantity').val(1)
                        //product price
                        if (data.product.discount_price == null) {
                            $('#pprice').text('')
                            $('#oldprice').text('')
                            $('#pprice').text(data.product.selling_price)
                        } else {
                            $('#pprice').text(data.product.discount_price)
                            $('#oldprice').text(data.product.selling_price)
                        }

                        //product color
                        $('select[name="color"]').empty();
                        $.each(data.color, function(key, value) {
                            $('select[name="color"]').append('<option value=" ' + value + ' "> ' + value + ' </option>')
                        })

                        //product size
                        $('select[name="size"]').empty();
                        $.each(data.size, function(key, value) {
                            $('select[name="size"]').append('<option value=" ' + value + '">' + value + '</option>')
                            if (data.size == "") {
                                $('#sizeArea').hide();
                            } else {
                                $('#sizeArea').show();
                            }
                        })

                        //product stock
                        if (data.product.product_quantity > 0) {
                            $('#available').text('')
                            $('#outofstock').text('')
                            $('#available').text('Available')
                        } else {
                            $('#available').text('')
                            $('#outofstock').text('')
                            $('#outofstock').text('Out of Stock')
                        }

                    }
                })
            }

            function addToCart() {
                var product_name = $('#pname').text()
                var id = $('#product_id').val()
                var color = $('#color option:selected').text()
                var size = $('#size option:selected').text()
                var quantity = $('#qty').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                    },
                    url: '/cart/data/store/' + id,
                    success: function(data) {
                        $('#closeModel').click()
                        // console.log(data)

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }
                    }
                })
            }
        </script>

</body>

</html>