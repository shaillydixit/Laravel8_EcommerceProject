@extends('admin.master')
@section('content')
<br>
<div class="col-md-8">
    <div class="white-box">
        <h3 class="box-title m-b-2">Add SubSubCategory</h3>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method="post" action="{{route('update.subsubcategory', $subsubcategories->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category</label>
                        <select name="category_id" class="form-control">
                            <option value="" selected="" disabled="">--select category--</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $subsubcategories->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select SubCategory</label>
                        <select name="subcategory_id" class="form-control">
                            <option value="" selected="" disabled="">--select subcategory--</option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}" {{$subcategory->id == $subsubcategories->subcategory_id ? 'selected' : ''}}>{{$subcategory->subcategory_name}}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SubSubCategory Name</label>
                        <input type="text" class="form-control" name="subsubcategory_name" value="{{$subsubcategories->subsubcategory_name}}">
                        @error('subsubcategory_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update SubSubCategory">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection