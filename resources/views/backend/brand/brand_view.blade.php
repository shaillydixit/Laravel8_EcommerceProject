@extends('admin.master')
@section('content')
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Brands</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Category</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Brand Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Brand Image</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)">{{$row['category']['category_name']}}</a></td>
                        <td class="title"><a href="javascript:void(0)">{{$row->brand_name}}</a></td>
                        <td class="tablesaw-priority-3"><img src="{{asset($row->brand_image)}}" alt=""></td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.brand', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.brand', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$brands->links('vendor.pagination.custom')}}
        </div>
    </div>

    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add Brand</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.brand')}}" enctype="multipart/form-data">
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
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" placeholder="Enter Brand name">
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
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New Brand">
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
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection