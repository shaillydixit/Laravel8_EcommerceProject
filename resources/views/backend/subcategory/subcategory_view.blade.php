@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All SubCategory</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Category</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">SubCategory Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)">{{$row['category']['category_name']}}</a></td>
                        <td class="title"><a href="javascript:void(0)">{{$row->subcategory_name}}</a></td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.subcategory', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.subcategory', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$subcategories->links('pagination-links')}}
        </div>
    </div>
    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add SubCategory</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.subcategory')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="" selected="" disabled="">--select category--</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SubCategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name" placeholder="Enter SubCategory Name">
                            @error('subcategory_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New SubCategory">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection