@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Districts</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" width="60%">Division Id</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" width="60%">District Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($districts as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->division->division_name}}</td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->district_name}}</td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.district', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.district', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$districts->links('vendor.pagination.custom')}}
        </div>
    </div>

    <div class="col-md-4">
        <div class="white-box">
            <h3 class="box-title m-b-2">Add District</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.district')}}">
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
                            <label for="exampleInputEmail1">District Name</label>
                            <input type="text" class="form-control" name="district_name" placeholder="Enter district name">
                            @error('district_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New District">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection