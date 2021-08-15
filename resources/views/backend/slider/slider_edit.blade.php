@extends('admin.master')
@section('content')

<div class="col-md-4">
    <div class="white-box">
        <h3 class="box-title m-b-2">Add Slider</h3>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method="post" action="{{route('update.slider', $sliders->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slider Image</label>
                        <input type="file" class="form-control" name="slider_image" onchange="mainImage(this)">
                        <img src="{{asset($sliders->slider_image)}}" id="mainImg" style="width:130px; height:100px;">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slider Title</label>
                        <input type="text" class="form-control" name="title" value="{{$sliders->title}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slider Description</label>
                        <input type="text" class="form-control" name="description" value="{{$sliders->description}}">
                        </textarea>
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update Slider">
                    </div>
                </form>
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