@extends('admin.master')
@section('content')
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Edit Advertisement</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.advertisement', $ads->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$ads->ads_image}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Title</label>
                            <input type="text" class="form-control" name="ads_title" value="{{$ads->ads_title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Description</label>
                            <input type="text" class="form-control" name="ads_description" value="{{$ads->ads_description}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Discount(%)</label>
                            <input type="text" class="form-control" name="ads_discount" value="{{$ads->ads_discount}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Image</label>
                            <input type="file" class="form-control" name="ads_image" onchange="mainImage(this)">
                            <img src="{{asset($ads->ads_image)}}" id="mainImg" style="width:130px; height:100px;">
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Edit Advertisement">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function mainImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainImg').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection