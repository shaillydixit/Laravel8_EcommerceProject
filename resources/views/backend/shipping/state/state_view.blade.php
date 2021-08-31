@extends('admin.master')
@section('content')

<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All States</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" width="20%">Division Id</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" width="20%">District Id</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" width="20%">State Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($states as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->division->division_name}}</td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->district->district_name}}</td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->state_name}}</td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.state', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.state', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- $coupans->links('pagination-links') -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add States</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.state')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Division</label>
                            <select name="division_id" class="form-control">
                                <option value="" selected="" disabled="">--select division--</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}">{{$division->division_name}}</option>
                                @endforeach
                            </select>
                            @error('division_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select District</label>
                            <select name="district_id" class="form-control">
                                <option value="" selected="" disabled="">--select district--</option>

                            </select>
                            @error('district_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">State Name</label>
                            <input type="text" class="form-control" name="state_name" placeholder="Enter state name">
                            @error('state_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New State">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{url('/division/district/ajax')}}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value ="' + value.id + '">' +
                                value.district_name + '</option>')
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