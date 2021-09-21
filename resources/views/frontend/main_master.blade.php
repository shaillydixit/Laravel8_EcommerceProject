<!doctype html>
<html lang="en">
@php
$seo = App\Models\SeoSetting::find(1);
@endphp

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <!-- /// Google Analytics Code // -->
    <script>
    {{ $seo->google_analytics }}
    </script>
    <!-- /// Google Analytics Code // -->
    <title>Shailly Ecommerce</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
    </style>

    <!-- stripe -->
    <script src="https://js.stripe.com/v3/"></script>
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
                        miniCart()
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
        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)
                        $('span[id="cartSubTotal"]').text(response.cartTotal)
                        $('span[id="cartQty"]').text(response.cartQty)
                        var miniCart = ""
                        $.each(response.carts, function(key, value) {
                            miniCart += ` <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">${value.name}</h6>
                                                        <p class="cart-product-price">${value.price} * ${value.qty}</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <button type="submit" class="cart-product-cancel position-absolute" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class='bx bx-x'></i>
                                                        </button>
                                                        <div class="cart-product">
                                                            <img src="/${value.options.image}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>`
                        })
                        $('#miniCart').html(miniCart);
                    }
                })
            }
            miniCart()

            // mini cart remove
            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product/remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart()

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


        <!-- wishlist -->
        <script type="text/javascript">
            function addToWishlist(product_id) {
                $.ajax({
                    type: 'POST',
                    url: '/add/wishlist/' + product_id,
                    dataType: 'json',

                    success: function(data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                    }
                })
            }
        </script>
        <!-- end wishlist -->

        <!-- wishlist data  -->

        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: 'GET',
                    url: '/user/get/wishlist',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)
                        var rows = ""
                        $.each(response, function(key, value) {
                            rows += ` <div class="card rounded-0 product-card">
                            <a href="">
                                <img src="/${value.product.product_thumbnail}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <div class="product-info">
                                    <a href="">
                                        <h6 class="product-name mb-2">${value.product.product_name}</h6>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">${value.product.selling_price}</span>
                                            <span class="fs-5">${value.product.discount_price}</span>
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
                                        <a href="javascript:;" class="btn btn-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
										<button type="submit" class="btn btn-light btn-ecomm" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class='bx bx-zoom-in'></i>Remove From List</button>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`
                        })
                        $('#wishlist').html(rows);
                    }
                })
            }
            wishlist()

            // wishlist remove
            function wishlistRemove(id) {
                $.ajax({
                    type: 'GET',
                    url: '/user/wishlist-remove/' + id,
                    dataType: 'json',
                    success: function(data) {
                        wishlist();
                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                        // End Message 
                    }
                });
            }
        </script>
        <!-- end wishlist data -->



        </script>





        <!-- /// Load My Cart /// -->

        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        var rows = ""
                        $.each(response.carts, function(key, value) {
                            rows += ` <div class="row align-items-center g-3">
                                    <div class="col-12 col-lg-6">
                                        <div class="d-lg-flex align-items-center gap-2">
                                            <div class="cart-img text-center text-lg-start">
                                                <img src="/${value.options.image}" width="130" alt="">
                                            </div>
                                            <div class="cart-detail text-center text-lg-start">
                                                <h6 class="mb-2">${value.name}</h6>
                                                <p class="mb-0">Size: 
                                                ${value.options.size == null
                                                    ? `<span>...</span>`
                                                    :`<span>${value.options.size}</span>`
                                                }
                                                </p>
                                                <p class="mb-2">Color:  
                                                ${value.options.color == null
                                                ? `<span>....</span>`
                                                :` <span>${value.options.color}</span>` 
                                                }
                                                </p>
                                                <h5 class="mb-0">$<span>${value.price}</span> </h5>
                                            </div>
                                        </div>
                                        </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="cart-action text-center">
                                        <div class="row">   
                                        ${value.qty > 1
                                        ? `<button type="submit" class="btn btn-danger btn-sm" style="width: 40px;" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                        : `<button type="submit" class="btn btn-danger btn-sm" style="width: 40px;" disabled>-</button>`
                                            }         
                                        <input type="text" class="form-control" value="${value.qty}" min="1" max="10" disabled="" style="width: 40px;">    
                                        <button type="submit" class="btn btn-success btn-sm" style="width: 40px;" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="text-center">
                                            <div class="d-flex gap-2 justify-content-center justify-content-lg-end"> <a href="javascript:;" class="btn btn-dark rounded-0 btn-ecomm" id="${value.rowId}" onclick="cartRemove(this.id)"><i class='bx bx-x-circle'></i> Remove</a>
                                                <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm" ><i class='bx bx-heart me-0'></i></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <br>`

                        });

                        $('#cartPage').html(rows);
                    }
                })
            }
            cart();


            function cartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/cart-remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        coupanCalculation()
                        cart()
                        miniCart()
                        $('#coupanField').show()
                        $('#coupan_name').val('')
                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                    }
                });
            }


            // cart decrement
            function cartDecrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/cart/decrement/' + rowId,
                    dataType: 'json',

                    success: function(data) {
                        coupanCalculation()
                        cart()
                        miniCart()

                    }
                })
            }
            //cart increment
            function cartIncrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/cart/increment/' + rowId,
                    dataType: 'json',

                    success: function(data) {
                        coupanCalculation()
                        cart()
                        miniCart()

                    }
                })
            }
        </script>


        <!-- apply coupan -->
        <script type="text/javascript">
            function applyCoupan() {
                var coupan_name = $('#coupan_name').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        coupan_name: coupan_name
                    },
                    url: "{{url('/coupan-apply')}}",
                    success: function(data) {
                        coupanCalculation()
                        if (data.validity == true) {
                            $('#coupanField').hide()
                        }
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                    }
                })
            }


            // !--coupan calculation-- >
            function coupanCalculation() {
                $.ajax({
                    type: 'GET',
                    url: "{{url('/coupan-calculation')}}",
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        if (data.total) {
                            $('#coupanCalculation').html(
                                `   <div class="card-body">
                                    <p class="mb-2">Subtotal: <span class="float-end">${data.total}</span>
                                    </p>
                                    <div class="my-3 border-top"></div>
                                    <h5 class="mb-0">Order Total: <span class="float-end">$ ${data.total}</span></h5>
                                </div>`
                            )
                        } else {
                            $('#coupanCalculation').html(
                                ` <div class="card-body">
                                    <p class="mb-2">Subtotal: <span class="float-end">${data.subtotal}</span>
                                    </p>
                                    <p class="mb-2">Shipping: <span class="float-end">FREE</span>
                                    </p>
                                    <p class="mb-2">Coupon: <span class="float-end">${data.coupan_name} (${data.coupan_discount})%</span>
                                    <button type="submit" onclick="coupanRemove()">Remove Coupan</button>
                                    </p>
                                    <p class="mb-0">Discount: <span class="float-end">$ ${data.discount_amount}</span>
                                    </p>
                                    <div class="my-3 border-top"></div>
                                    <h5 class="mb-0">Order Total: <span class="float-end">$ ${data.total_amount}</span></h5>                        
                                </div>`
                            )
                        }
                    }
                })
            }
            coupanCalculation()
            // !--end coupan calculation-- >
        </script>

        <!-- end apply coupan -->

        <!-- coupan remove -->
        <script type="text/javascript">
            function coupanRemove() {
                $.ajax({
                    type: 'GET',
                    url: "{{url('/coupan-remove')}}",
                    dataType: 'json',
                    success: function(data) {
                        coupanCalculation()
                        $('#coupanField').show()
                        $('#coupan_name').val('')
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                    }
                })
            }
        </script>
        <!-- end coupan remove -->
</body>

</html>