@extends('admin.master')
@section('content')
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Advertisements</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Title</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Description</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Discount</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Image</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Status</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ads as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->ads_title}}</td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->ads_description}}</td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->ads_discount}}</td>
                        <td class="tablesaw-priority-3"><img src="{{asset($row->ads_image)}}" alt="" style="width:80px; height:80px;"></td>
                        <td class="title"><a href="javascript:void(0)"></a>
                            @if($row->status == 1)
                            <span class="badge bage-pill badge-success">Active</span>
                            @else
                            <span class="badge bage-pill badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.advertisement', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.advertisement', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add Advertisement</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('add.advertisement')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Title</label>
                            <input type="text" class="form-control" name="ads_title" placeholder="Enter Advertisement Title">
                            @error('ads_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Description</label>
                            <input type="text" class="form-control" name="ads_description" placeholder="Enter Advertisement Description">
                            @error('ads_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Discount(%)</label>
                            <input type="text" class="form-control" name="ads_discount" placeholder="Enter Advertisement Discount">
                            @error('aDs_discount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Advertisement Image</label>
                            <input type="file" class="form-control" name="ads_image" onchange="mainImage(this)">
                            <img src="" id="mainImg">
                            @error('ads_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New Advertisement">
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