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
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fab fa-product-hunt"></i><span class="hide-menu">&nbsp &nbsp Products</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('add.product')}}">Add Product</a></li>
                        <li><a href="{{route('manage.product')}}">Manage Products</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-sliders-h"></i><span class="hide-menu">&nbsp &nbsp Slider</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="{{route('manage.slider')}}">Manage Slider</a> </li>
                    </ul>
                </li>
              
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-pie-chart fa-fw"></i> <span class="hide-menu">Coupons</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('manage.coupans')}}">Manage Coupons</a></li>
                    </ul>
                </li>
             
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-truck"></i><span class="hide-menu">&nbsp &nbsp Shipping</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('manage.division')}}">Shipping Division</a></li>
                        <li><a href="{{route('manage.district')}}">Shipping District</a></li>
                        <li><a href="{{route('manage.state')}}">Shipping State</a></li>
                    </ul>
                </li>

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

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-file-alt "></i><span class="hide-menu">&nbsp &nbsp &nbsp All Reports</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.reports')}}">All Reports</a></li>
                    </ul>
                </li>
          
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fab fa-blogger-b"></i></i> <span class="hide-menu">&nbsp &nbsp Manage Blogs</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('blog.category')}}">Blog Category</a></li>
                        <li><a href="{{route('add.blog.post')}}">Add Blog Post</a></li>
                        <li><a href="{{route('list.blog.post')}}">List Blog Post</a></li>
                    </ul>
                </li>
               
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-user fa-fw"></i> <span class="hide-menu">All Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.users')}}">All Users</a></li>
                    </ul>
                </li>
             
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-user-cog"></i><span class="hide-menu">&nbsp &nbsp Admin User Role</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.admin.users')}}">All Admin Users</a></li>
                    </ul>
                </li>
                
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-cogs"></i><span class="hide-menu">&nbsp &nbsp Website Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('site.settings')}}">Site Settings</a></li>
                        <li><a href="{{route('seo.settings')}}">SEO Settings</a></li>
                    </ul>
                </li>
               
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-people-carry"></i><span class="hide-menu">&nbsp &nbsp Return Order</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('return.request')}}">Return Request</a></li>
                        <li><a href="{{route('all.request')}}">All Request</a></li>
                    </ul>
                </li>
                
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="far fa-comment-alt"></i> <span class="hide-menu">&nbsp &nbsp Product Reviews</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('pending.reviews')}}">Pending Reviews</a></li>
                        <li><a href="{{route('publish.reviews')}}">Publish Reviews</a></li>
                    </ul>
                </li>
               
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fas fa-archive"></i><span class="hide-menu">&nbsp &nbsp Product Stocks</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('product.stock')}}">Manage Products</a></li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="fab fa-buysellads"></i><span class="hide-menu">&nbsp &nbsp Advertisement</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('all.advertisement')}}">All Advertisement</a></li>
                    </ul>
                </li>



            </ul>
        </nav>
    </div>
</aside>