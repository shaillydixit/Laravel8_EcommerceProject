@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Edit Blog Category</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.blog.category', $blogCategory->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Blog Category Name</label>
                            <input type="text" class="form-control" name="blog_category_name" value="{{$blogCategory->blog_category_name}}">
                            @error('blog_category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update Blog Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection