<section class="py-4">
    <div class="container">
        <div class="add-banner">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                @php
                $ads = App\Models\Advertisement::where('status', 1)->orderBy('id', 'ASC')->get();
                @endphp
                @foreach($ads as $ad )
                <div class="col d-flex">
                    <div class="card rounded-0 w-100 border shadow-none">
                        <img src="{{asset($ad->ads_image)}}" class="card-img-top" alt="...">
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">{{$ad->ads_discount}}%</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$ad->ads_title}}</h5>
                            <p class="card-text">{{$ad->ads_discription}}</p>
                            <a href="{{route('shop.page')}}" class="btn btn-dark btn-ecomm">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                @endforeach

                @php
                $ads = App\Models\Advertisement::where('status', 0)->orderBy('id', 'ASC')->get();
                @endphp
                @foreach($ads as $ad )
                <div class="col d-flex">
                    <div class="card rounded-0 w-100 border shadow-none">
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">{{$ad->ads_discount}}%</span>
                        </div>
                        <div class="card-body text-center mt-5">
                            <h5 class="card-title">{{$ad->ads_title}}</h5>
                            <p class="card-text">{{$ad->ads_discription}}</p>
                            <a href="{{route('shop.page')}}" class="btn btn-dark btn-ecomm">SHOP NOW</a>
                        </div>
                        <img src="{{asset($ad->ads_image)}}" class="card-img-top" alt="...">
                    </div>
                </div>
                @endforeach
            </div>
            <!--end row-->
        </div>
    </div>
</section>