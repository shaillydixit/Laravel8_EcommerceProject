@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Categories</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Category Icon</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Category Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $row)
                    <tr>
                        <td class="tablesaw-priority-3"> <span><i class="{{$row->category_icon}}"></i></span></td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->category_name}}</td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.category', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.category', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links('pagination-links')}}

        </div>
    </div>

    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add Category</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.category')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter category name">
                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Icon</label>
                            <input type="text" class="form-control" name="category_icon" placeholder="Enter category icon">
                            @error('category_icon')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection