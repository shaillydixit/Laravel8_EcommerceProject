@extends('admin.master')
@section('content')
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All SubSubCategory</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Category</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">SubCategory</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">SubSubCategory Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subsubcategories as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)">{{$row['category']['category_name']}}</a></td>
                        <td class="title"><a href="javascript:void(0)">{{$row['subcategory']['subcategory_name']}}</a></td>
                        <td class="title"><a href="javascript:void(0)">{{$row->subsubcategory_name}}</a></td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.subsubcategory', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.subsubcategory', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$subsubcategories->links('pagination-links')}}
        </div>
    </div>
    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add SubSubCategory</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.subsubcategory')}}">
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
                            <label for="exampleInputEmail1">Select SubCategory</label>
                            <select name="subcategory_id" class="form-control">
                                <option value="" selected="" disabled="">--select subcategory--</option>

                            </select>
                            @error('subcategory_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SubSubCategory Name</label>
                            <input type="text" class="form-control" name="subsubcategory_name" placeholder="Enter SubSubCategory Name">
                            @error('subsubcategory_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New SubSubCategory">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{url('/category/subcategory/ajax')}}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value ="' + value.id + '">' +
                                value.subcategory_name + '</option>')
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection