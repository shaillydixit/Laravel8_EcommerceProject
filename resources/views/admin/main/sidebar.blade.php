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
                        <li><a href="{{route('admin.profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="{{route('admin.change.password')}}"><i class="fa fa-inbox"></i> Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Shailly Dixit</a></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">
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
                @php
                $brand = (auth()->guard('admin')->user()->brand == 1);
                $category = (auth()->guard('admin')->user()->category == 1);
                $product = (auth()->guard('admin')->user()->product == 1);
                $slider = (auth()->guard('admin')->user()->slider == 1);
                $coupan = (auth()->guard('admin')->user()->coupan == 1);
                $shipping = (auth()->guard('admin')->user()->shipping == 1);
                $blog = (auth()->guard('admin')->user()->blog == 1);
                $setting = (auth()->guard('admin')->user()->setting == 1);
                $return_order = (auth()->guard('admin')->user()->return_order == 1);
                $review = (auth()->guard('admin')->user()->review == 1);
                $orders = (auth()->guard('admin')->user()->orders == 1);
                $stock = (auth()->guard('admin')->user()->stock == 1);
                $reports = (auth()->guard('admin')->user()->reports == 1);
                $all_user = (auth()->guard('admin')->user()->all_user == 1);
                $admin_user_role = (auth()->guard('admin')->user()->admin_user_role == 1);
                @endphp

                @if($brand == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-notebook fa-fw"></i> <span class="hide-menu"> Brands </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.brand')}}">All Brands</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($category == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-grid fa-fw"></i> <span class="hide-menu">Categories</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.category')}}">All Category</a></li>
                        <li><a href="{{route('all.subcategory')}}">All SubCategory</a></li>
                        <li><a href="{{route('all.subsubcategory')}}">All SubSubCategory</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($product == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fab fa-product-hunt"></i><span class="hide-menu">&nbsp &nbsp Products</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('add.product')}}">Add Product</a></li>
                        <li><a href="{{route('manage.product')}}">Manage Products</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($slider == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-sliders-h"></i><span class="hide-menu">&nbsp &nbsp Slider</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="{{route('manage.slider')}}">Manage Slider</a> </li>
                    </ul>
                </li>
                @else
                @endif

                @if($coupan == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-pie-chart fa-fw"></i> <span class="hide-menu">Coupons</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('manage.coupans')}}">Manage Coupons</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($shipping == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-truck"></i><span class="hide-menu">&nbsp &nbsp Shipping</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('manage.division')}}">Shipping Division</a></li>
                        <li><a href="{{route('manage.district')}}">Shipping District</a></li>
                        <li><a href="{{route('manage.state')}}">Shipping State</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($orders == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-box-open"></i> <span class="hide-menu">&nbsp &nbsp Orders</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('pending.orders')}}">Pending Orders</a></li>
                        <li><a href="{{route('confirmed.orders')}}">Confirmed Orders</a></li>
                        <li><a href="{{route('processing.orders')}}">Processing Orders</a></li>
                        <li><a href="{{route('pickedup.orders')}}">PickedUp Orders</a></li>
                        <li><a href="{{route('shipped.orders')}}">Shipped Orders</a></li>
                        <li><a href="{{route('delivered.orders')}}">Delivered Orders</a></li>
                        <li><a href="{{route('cancelled.orders')}}">Cancelled Orders</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($reports == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-file-alt "></i><span class="hide-menu">&nbsp &nbsp &nbsp All Reports</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.reports')}}">All Reports</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($blog == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fab fa-blogger-b"></i></i> <span class="hide-menu">&nbsp &nbsp Manage Blogs</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('blog.category')}}">Blog Category</a></li>
                        <li><a href="{{route('add.blog.post')}}">Add Blog Post</a></li>
                        <li><a href="{{route('list.blog.post')}}">List Blog Post</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($all_user == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-user fa-fw"></i> <span class="hide-menu">All Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.users')}}">All Users</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($admin_user_role == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-user-cog"></i><span class="hide-menu">&nbsp &nbsp Admin User Role</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.admin.users')}}">All Admin Users</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($setting == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-cogs"></i><span class="hide-menu">&nbsp &nbsp Website Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('site.settings')}}">Site Settings</a></li>
                        <li><a href="{{route('seo.settings')}}">SEO Settings</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($return_order == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-people-carry"></i><span class="hide-menu">&nbsp &nbsp Return Order</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('return.request')}}">Return Request</a></li>
                        <li><a href="{{route('all.request')}}">All Request</a></li>
                    </ul>
                </li>
                @else
                @endif

                @if($review == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="far fa-comment-alt"></i> <span class="hide-menu">&nbsp &nbsp Product Reviews</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('pending.reviews')}}">Pending Reviews</a></li>
                        <li><a href="{{route('publish.reviews')}}">Publish Reviews</a></li>
                    </ul>
                </li>
                @else
                @endif


                @if($stock == true)
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-archive"></i><span class="hide-menu">&nbsp &nbsp Product Stocks</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('product.stock')}}">Manage Products</a></li>
                    </ul>
                </li>
                @else
                @endif

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fab fa-buysellads"></i><span class="hide-menu">&nbsp &nbsp Advertisement</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.advertisement')}}">All Advertisement</a></li>
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