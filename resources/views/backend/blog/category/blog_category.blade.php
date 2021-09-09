@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">Blog Categories</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Blog Catgeory Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogCategory as $row)
                    <tr>
                        <td class="tablesaw-priority-3"> {{$row->blog_category_name}}</td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.blog.category', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.blog.category', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add Blog Category</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.blog.category')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Blog Category Name</label>
                            <input type="text" class="form-control" name="blog_category_name" placeholder="Enter blog category name">
                            @error('blog_category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New Blog Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection