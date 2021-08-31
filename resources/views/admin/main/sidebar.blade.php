<aside class="sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <img src="{{asset('backend/plugins/images/users/hanna.jpg')}}" alt="user-img" class="img-circle">
                    <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Shailly Dixit</a></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-basket fa-fw"></i> <span class="hide-menu"> eCommerce </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="index4.html">Dashboard</a> </li>
                        <li> <a href="products.html">Products</a> </li>
                        <li> <a href="product-detail.html">Product Detail</a> </li>
                        <li> <a href="product-edit.html">Product Edit</a> </li>
                        <li> <a href="product-orders.html">Product Orders</a> </li>
                        <li> <a href="product-cart.html">Product Cart</a> </li>
                        <li> <a href="product-checkout.html">Product Checkout</a> </li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-envelope-letter fa-fw"></i> <span class="hide-menu"> Inbox <span class="label label-rounded label-primary pull-right">5</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="inbox.html">Mail Box</a> </li>
                        <li> <a href="inbox-detail.html">Mail Details</a> </li>
                        <li> <a href="compose.html">Compose Mail</a> </li>
                        <li> <a href="contact.html">Contact</a> </li>
                        <li> <a href="contact-detail.html">Contact Detail</a> </li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-notebook fa-fw"></i> <span class="hide-menu"> Brands </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.brand')}}">All Brands</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-grid fa-fw"></i> <span class="hide-menu">Categories</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.category')}}">All Category</a></li>
                        <li><a href="{{route('all.subcategory')}}">All SubCategory</a></li>
                        <li><a href="{{route('all.subsubcategory')}}">All SubSubCategory</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-pie-chart fa-fw"></i> <span class="hide-menu">Products</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('add.product')}}">Add Product</a></li>
                        <li><a href="{{route('manage.product')}}">Manage Products</a></li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-bulb fa-fw"></i> <span class="hide-menu"> Slider</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="{{route('manage.slider')}}">Manage Slider</a> </li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-pie-chart fa-fw"></i> <span class="hide-menu">Coupans</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('manage.coupans')}}">Manage Coupans</a></li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-pie-chart fa-fw"></i> <span class="hide-menu">Shipping</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('manage.division')}}">Shipping Division</a></li>
                        <li><a href="{{route('manage.district')}}">Shipping District</a></li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-location-pin fa-fw"></i> <span class="hide-menu"> Maps</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="map-google.html">Google Map</a> </li>
                        <li> <a href="map-vector.html">Vector Map</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="calendar.html" aria-expanded="false"><i class="icon-calender fa-fw"></i> <span class="hide-menu"> Calendar</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>