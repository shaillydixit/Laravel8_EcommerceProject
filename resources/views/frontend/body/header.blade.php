<div class="discount-alert d-none d-lg-block">
    <div class="alert alert-dismissible fade show shadow-none rounded-0 mb-0 border-bottom">
         <div class="d-lg-flex align-items-center gap-2 justify-content-center">
            <p class="mb-0">Get Up to <strong>40% OFF</strong> New-Season Styles</p>
            <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Men</a>
            <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Women</a>
            <p class="mb-0 font-13">*Limited time only</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<!--start top header wrapper-->
<div class="header-wrapper">
    <div class="top-menu border-bottom">
        <div class="container">
            <nav class="navbar navbar-expand">
                <div class="shiping-title text-uppercase font-13 d-none d-sm-flex">Welcome to our eTrans store!</div>
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item"> <a class="nav-link" href="order-tracking.html">Track Order</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="about-us.html">About</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Stores</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:;">Help & FAQs</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">USD</a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="#">USD</a>
                            </li>
                            <li><a class="dropdown-item" href="#">EUR</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            <div class="lang d-flex gap-1">
                                <div><i class="flag-icon flag-icon-um"></i>
                                </div>
                                <div><span>ENG</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-end">
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"> <i class="flag-icon flag-icon-de me-2"></i><span>German</span>
                            </a> <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-fr me-2"></i><span>French</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-um me-2"></i><span>English</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-in me-2"></i><span>Hindi</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-cn me-2"></i><span>Chinese</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-ae me-2"></i><span>Arabic</span></a>
                        </div>
                    </li>
                    @auth
                    <li class="nav-item"> <a class="nav-link" href="{{route('dashboard')}}">User Profile</a>
                    </li>
                    @else
                    <li class="nav-item"> <a class="nav-link" href="{{route('login')}}">Login/Register</a>
                    </li>
                    @endauth
                </ul>
                <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                    <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-facebook'></i></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-twitter'></i></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-linkedin'></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header-content pb-3 pb-md-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4 col-md-auto">
                    <div class="d-flex align-items-center">
                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
                        </div>
                        <div class="logo d-none d-lg-flex">
                            <a href="index.html">
                                <img src="{{asset('frontend/assets/images/logo-icon.png')}}" class="logo-icon" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-md order-4 order-md-2">
                    <div class="input-group flex-nowrap px-xl-4">
                        <input type="text" class="form-control w-100" placeholder="Search for Products">
                        <select class="form-select flex-shrink-0" aria-label="Default select example" style="width: 10.5rem;">
                            <option selected>All Categories</option>
                            @php
                            $categories = App\Models\Category::orderBy('category_name', 'DESC')->get();
                            @endphp
                            @foreach($categories as $category)
                            <option value="1">{{$category->category_name}}</option>
                            @endforeach
                        </select> <span class="input-group-text cursor-pointer bg-transparent"><i class='bx bx-search'></i></span>
                    </div>
                </div>
                <div class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
                    <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                    </div>
                    <div class="ms-2">
                        <p class="mb-0 font-13">CALL US NOW</p>
                        <h5 class="mb-0">+011 5827918</h5>
                    </div>
                </div>
                <div class="col-4 col-md-auto order-2 order-md-4">
                    <div class="top-cart-icons float-end">
                        <nav class="navbar navbar-expand">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a href="{{route('dashboard')}}" class="nav-link cart-link"><i class='bx bx-user'></i></a>
                                </li>
                                <li class="nav-item"><a href="wishlist.html" class="nav-link cart-link"><i class='bx bx-heart'></i></a>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown"> <span class="alert-count">8</span>
                                        <i class='bx bx-shopping-bag'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;">
                                            <div class="cart-header">
                                                <p class="cart-header-title mb-0">8 ITEMS</p>
                                                <p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
                                            </div>
                                        </a>
                                        <div class="cart-list">
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Men White T-Shirt</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/01.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Puma Sports Shoes</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/05.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Women Red Sneakers</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/17.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Black Headphone</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/10.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Blue Girl Shoes</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/08.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Men Leather Belt</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/18.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Men Yellow T-Shirt</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/04.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="cart-product-title">Pool Charir</h6>
                                                        <p class="cart-product-price">1 X $29.00</p>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                                        </div>
                                                        <div class="cart-product">
                                                            <img src="{{asset('frontend/assets/images/products/16.png')}}" class="" alt="product image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a href="javascript:;">
                                            <div class="text-center cart-footer d-flex align-items-center">
                                                <h5 class="mb-0">TOTAL</h5>
                                                <h5 class="mb-0 ms-auto">$189.00</h5>
                                            </div>
                                        </a>
                                        <div class="d-grid p-3 border-top"> <a href="javascript:;" class="btn btn-dark btn-ecomm">CHECKOUT</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <div class="primary-menu border-top">
        <div class="container">
            <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
                <div class="offcanvas-header">
                    <button class="btn-close float-end"></button>
                    <h5 class="py-2">Navigation</h5>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item active"> <a class="nav-link" href="index.html">Home </a>
                    </li>
                    <!-- get category data  -->
                    @php
                    $categories = App\Models\Category::orderBy('category_name', 'DESC')->get();
                    @endphp

                    @foreach($categories as $category)
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">{{$category->category_name}}<i class='bx bx-chevron-down'></i></a>
                        <div class="dropdown-menu dropdown-large-menu">
                            <div class="row">
                                @php
                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name', 'DESC')->get();
                                @endphp
                                @foreach($subcategories as $subcategory)
                                <div class="col-md-4">
                                    <ul class="">
                                        <li>
                                            <h6><a href="#">{{$subcategory->subcategory_name}}</a></h6>
                                            @php
                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)->orderBy('subsubcategory_name', 'DESC')->get();
                                            @endphp
                                            @foreach($subsubcategories as $subsubcategory)
                                            <ul class="">
                                                <li><a href="#">{{$subsubcategory->subsubcategory_name}}</a>
                                            </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>

                                @endforeach
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- dropdown-large.// -->
                    </li>
                    @endforeach

                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account <i class='bx bx-chevron-down'></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('user.orders')}}">Orders</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('user.payment')}}">Payment Methods</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('user.profile')}}">User Details</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>