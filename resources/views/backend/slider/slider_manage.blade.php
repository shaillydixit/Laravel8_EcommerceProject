@extends('admin.master')
@section('content')
<br>
<div class="col-lg-8">
    <div class="white-box">
        <h3 class="box-title m-b-0">All Sliders</h3>

        <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Slider Image</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Slider Title</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Slider Description</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Slider Status</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sliders as $item)
                <tr>
                    <td class="tablesaw-priority-3"><img src="{{asset($item->slider_image)}}" alt="" style="width: 120px; height: 40px;"></td>
                    <td class="title">
                        @if($item->title == NULL)
                        <span class="badge badge-pill badge-info"> No Title </span>
                        @else
                        {{$item->title}}
                        @endif
                    </td>
                    <td class="title">
                        @if($item->description == NULL)
                        <span class="badge badge-pill badge-info"> No Description </span>
                        @else
                        {{$item->description}}
                        @endif
                    </td>
                    <td class="title">
                        @if($item->status == 1)
                        <span class="badge badge-pill badge-success">Active</span>
                        @else
                        <span class="badge badge-pill badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="tablesaw-priority-2">
                        <a href="{{route('edit.slider', $item->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{route('delete.slider', $item->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        @if($item->status == 1)
                        <a href="{{route('inactive.slider', $item->id)}}" class="btn btn-danger" title="Inactive now"><i class="fa fa-arrow-down"></i></a>
                        @else
                        <a href="{{route('active.slider', $item->id)}}" class="btn btn-success" title="Active now"><i class="fa fa-arrow-down"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-4">
    <div class="white-box">
        <h3 class="box-title m-b-2">Add Slider</h3>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form method="post" action="{{route('store.slider')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slider Image</label>
                        <input type="file" class="form-control" name="slider_image" onchange="mainImage(this)">
                        <img src="" id="mainImg">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slider Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Slider Title">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Slider Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter Slider Description">
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New Slider">
                    </div>
                </form>
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