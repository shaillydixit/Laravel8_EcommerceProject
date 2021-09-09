@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Edit Category</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.category', $categories->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$categories->category_image}}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter category name" value="{{$categories->category_name}}">
                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Icon</label>
                            <input type="text" class="form-control" name="category_icon" placeholder="Enter category icon" value="{{$categories->category_icon}}">
                            @error('category_icon')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Image</label>
                            <input type="file" class="form-control" name="category_image" onchange="mainImage(this)">
                            <img src="" id="mainImg">
                            @error('category_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update Category">
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