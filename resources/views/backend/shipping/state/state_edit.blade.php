@extends('admin.master')
@section('content')

<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">

    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Edit States</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.state' , $states->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Division</label>
                            <select name="division_id" class="form-control">
                                <option value="" selected="" disabled="">--select division--</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}" {{$division->id == $states->division_id ? 'selected' :''}}>{{$division->division_name}}</option>
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
                                @foreach($districts as $district)
                                <option value="{{$district->id}}" {{$district->id == $states->district_id ? 'selected' :''}}>{{$district->district_name}}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">State Name</label>
                            <input type="text" class="form-control" name="state_name" value="{{$states->state_name}}">
                            @error('state_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Edit State">
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