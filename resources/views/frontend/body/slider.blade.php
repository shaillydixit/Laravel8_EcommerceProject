<section class="slider-section">
    <div class="first-slider">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
            </ol>
            @php
            $sliders = App\Models\Slider::where('status', 1)->orderBy('id', 'ASC')->get();
            @endphp
            @foreach($sliders as $slider )
            <div class="carousel-inner">
                <div class="carousel-item active bg-dark-gery">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h1 class="h1">{{$slider->title}}</h1>
                                <p class="pb-3">{{$slider->description}}</p>
                                <div class=""> <a class="btn btn-dark btn-ecomm" href="{{route('shop.page')}}">Shop Now <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{asset($slider->slider_image)}}" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
                @endforeach

                @php
                $sliders = App\Models\Slider::where('status', 0)->orderBy('id', 'DESC')->get();
                @endphp
                @foreach($sliders as $slider )
                <div class="carousel-item bg-dark-gery">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h1 class="h1">{{$slider->title}}</h1>
                                <p class="pb-3">{{$slider->description}}</p>
                                <div class=""> <a class="btn btn-dark btn-ecomm" href="{{route('shop.page')}}">Shop Now <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{asset($slider->slider_image)}}" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>