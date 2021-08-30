@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Divisions</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" width="60%">Division Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shippings as $row)
                    <tr>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->division_name}}</td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.division', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.division', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
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
            <h3 class="box-title m-b-2">Add Division</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form method="post" action="{{route('store.division')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Division Name</label>
                            <input type="text" class="form-control" name="division_name" placeholder="Enter division name">
                            @error('division_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-success mb-5" value="Add New Division">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection