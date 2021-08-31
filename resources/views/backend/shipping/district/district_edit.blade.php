@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-md-8">
        <div class="white-box">
            <h3 class="box-title m-b-2">Edit District</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('update.district' , $districts->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Division</label>
                            <select name="division_id" class="form-control">
                                <option value="" selected="" disabled="">--select division--</option>
                                @foreach($divisions as $division)
                                <option value="{{$division->id}}" {{$division->id == $districts->division_id ? 'selected' :''}}>{{$division->division_name}}</option>
                                @endforeach
                            </select>
                            @error('division_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">District Name</label>
                            <input type="text" class="form-control" name="district_name" value="{{$districts->district_name}}">
                            @error('district_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Edit District">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection