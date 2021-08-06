@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add SubCategory</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.subcategory', $subcategories->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="" selected="" disabled="">--select category--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $subcategories->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SubCategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name" value="{{$subcategories->subcategory_name}}">
                            @error('subcategory_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update SubCategory">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection