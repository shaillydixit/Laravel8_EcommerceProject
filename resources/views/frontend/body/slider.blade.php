<section class="slider-section">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  @php
            $sliders = App\Models\Slider::where('status', 1)->orderBy('id', 'ASC')->get();
            @endphp
            @foreach($sliders as $slider )
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset($slider->slider_image)}}" class="d-block w-100" style="height: 300px;" alt="...">
      <!-- <div class="carousel-caption d-none d-md-block">
        <h5>{{$slider->title}}</h5>
        <p>{{$slider->description}}</p>
      </div> -->
    </div>
    @endforeach

    @php
                $sliders = App\Models\Slider::where('status', 0)->orderBy('id', 'DESC')->get();
                @endphp
                @foreach($sliders as $slider )
    <div class="carousel-item">
      <img src="{{asset($slider->slider_image)}}" class="d-block w-100" style="height: 300px;" alt="...">
      <!-- <div class="carousel-caption d-none d-md-block">
        <h5>{{$slider->title}}</h5>
        <p>{{$slider->description}}</p>
      </div> -->
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>