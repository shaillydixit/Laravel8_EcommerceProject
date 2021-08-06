@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add Brand</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.brand', $brands->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="" selected="" disabled="">--select category--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $brands->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" value="{{$brands->brand_name}}">
                            @error('brand_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Image</label>
                            <input type="file" class="form-control" name="brand_image" onchange="mainImage(this)">
                            <img src="" id="mainImg">
                            @error('brand_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update Brand">
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
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection