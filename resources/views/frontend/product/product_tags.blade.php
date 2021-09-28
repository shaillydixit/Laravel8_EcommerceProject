@php
$tags = App\Models\Product::groupBy('product_tags')->select('product_tags')->limit(7)->get();
@endphp

<div class="col">
    <div class="footer-section3 mb-3">
        <h6 class="mb-3 text-uppercase">Popular Tags</h6>
        @foreach($tags as $tag)
        <div class="tags-box">
            <a href="{{url('product/tags/' .$tag->product_tags)}}" class="tag-link">{{str_replace(',',' ',$tag->product_tags) }}</a>
        </div>
        @endforeach
    </div>
</div>