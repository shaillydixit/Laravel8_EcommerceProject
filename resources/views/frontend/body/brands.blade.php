<section class="py-4">
    <div class="container">
        <h3 class="d-none">Brands</h3>
        <div class="brand-grid">
            <div class="brands-shops owl-carousel owl-theme border">

                @php
                $brands = App\Models\Brand::orderBy('brand_image', 'DESC')->get();
                @endphp
                @foreach($brands as $brand)
                <div class="item border-end">
                    <div class="p-4">
                        <a href="">
                            <img src="{{asset($brand->brand_image)}}" class="img-fluid" style="width:120px; height:100px;" alt="...">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>