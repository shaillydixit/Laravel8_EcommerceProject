<footer>
    <section class="py-4 border-top" style="background-color: rgba(64, 224, 208, 0.7);">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    @php
                    $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    <div class="footer-section1 mb-3">
                        <h6 class="mb-3 text-uppercase">Contact Info </h6>
                        <h6 class="mb-3 text-uppercase"><strong>{{$setting->company_name}}</strong></h6>
                        <div class="address mb-3">
                            <p class="mb-0 text-uppercase">Address</p>
                            <p class="mb-0 font-12">{{$setting->company_address}}</p>
                        </div>
                        <div class="phone mb-3">
                            <p class="mb-0 text-uppercase">Phone</p>
                            <p class="mb-0 font-13">Toll Free <span>{{$setting->phone_one}}</span></p>
                            <p class="mb-0 font-13">Mobile : <span>{{$setting->phone_two}}</span></p>
                        </div>
                        <div class="email mb-3">
                            <p class="mb-0 text-uppercase">Email</p>
                            <p class="mb-0 font-13">{{$setting->email}}</p>
                        </div>
                        <div class="working-days mb-3">
                            <p class="mb-0 text-uppercase">WORKING DAYS</p>
                            <p class="mb-0 font-13">{{$setting->working_days}}</p>
                        </div>
                        <div class="working-days mb-3">
                            <p class="list-inline-item"><i class='bx bxl-facebook'></i><a target="_blank" rel="nofollow" href="{{ $setting->facebook }}" title="Facebook"></a></p>
                            <p class="list-inline-item"><i class='bx bxl-twitter'></i><a target="_blank" rel="nofollow" href="{{ $setting->twitter }}" title="Twitter"></a></p>
                            <p class="list-inline-item"><i class='bx bxl-linkedin'></i><a target="_blank" rel="nofollow" href="{{ $setting->linkedin }}" title="Linkedin"></a></p>
                            <p class="list-inline-item"><i class='bx bxl-instagram'></i><a target="_blank" rel="nofollow" href="{{ $setting->youtube }}" title="Youtube"></a></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-section2 mb-3">
                        <h6 class="mb-3 text-uppercase">Shop Categories</h6>
                        @php
                        $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
                        @endphp
                        @foreach($categories as $cat)
                        <ul class="list-unstyled">
                            <li class="mb-1">
                                <a href="javascript:;"><i class='bx bx-chevron-right'></i>{{$cat->category_name}}</a>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                @include('frontend.product.product_tags')
                <div class="col">
                    <div class="footer-section4 mb-3">
                        <h6 class="mb-3 text-uppercase">Stay informed</h6>
                        <div class="subscribe">
                            <input type="text" class="form-control radius-30" placeholder="Enter Your Email" />
                            <div class="mt-2 d-grid"> <a href="javascript:;" class="btn btn-dark btn-ecomm radius-30">Subscribe</a>
                            </div>
                            <p class="mt-2 mb-0 font-13">Subscribe to our newsletter to receive early discount offers, updates and new products info.</p>
                        </div>
                        <div class="download-app mt-3">
                            <h6 class="mb-3 text-uppercase">Download our app</h6>
                            <div class="d-flex align-items-center gap-2">
                                <a href="javascript:;">
                                    <img src="{{asset('frontend/assets/images/icons/apple-store.png')}}" class="" width="160" alt="" />
                                </a>
                                <a href="javascript:;">
                                    <img src="{{asset('frontend/assets/images/icons/play-store.png')}}" class="" width="160" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <hr />
            <div class="row text-center">
                <div class="col">
                    <p class="mb-0">Copyright © 2021. <strong>Shailly Dixit</strong></p>
                </div>

            </div>
            <!--end row-->
        </div>
    </section>
</footer>