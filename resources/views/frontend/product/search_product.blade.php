<!-- <ul>
    @foreach($products as $item)
    <li> <img src="{{ asset($item->product_thumbnail) }}" style="width: 30px; height: 30px;"> {{ $item->product_name }} </li>
    @endforeach
</ul> -->

<style>
    body {
        background-color: #eee
    }

    .card {
        background-color: #fff;
        padding: 15px;
        border: none
    }

    .input-box {
        position: relative
    }

    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }

    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }

    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee
    }

    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center
    }

    .border-bottom {
        border-bottom: 2px solid #eee
    }

    .list i {
        font-size: 19px;
        color: red
    }

    .list small {
        color: #dedddd
    }
</style>

@if($products -> isEmpty())
<div class="container">
    <div class="row d-flex justify-content-left">
        <div class="col-md-8">
            <div class="card">
                <h6 class="text-center text-danger">Product Not Found </h6>
            </div>
        </div>
    </div>
</div>
@else

<div class="container">
    <div class="row d-flex justify-content-left">
        <div class="col-md-8">
            <div class="card">
                @foreach($products as $product)
                <a href="{{url('product/details/' .$product->id)}}">
                    <div class="list border-bottom"> <img src="{{ asset($product->product_thumbnail) }}" style="width: 30px; height: 30px;">
                        <div class="d-flex flex-column ml-3" style="margin-left: 10px;"> <span>{{ $product->product_name }} </span> <small> ${{ $product->selling_price }}</small> </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endif