@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Users</h3>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Image</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Name</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Email</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Phone</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Status</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td class="tablesaw-priority-3"><img src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 50px; height: 50px;"></td>
                        <td class="title"><a href="javascript:void(0)">{{$row->name}}</a></td>
                        <td class="title"><a href="javascript:void(0)">{{$row->email}}</a></td>
                        <td class="title"><a href="javascript:void(0)">{{$row->phone}}</a></td>

                        <td>
                            @if($row->UserOnline())
                            <span class="badge badge-pill badge-success">Active Now</span>
                            @else
                            <span class="badge badge-pill badge-danger">{{Carbon\Carbon::parse($row->last_seen)->diffForHumans()}}</span>
                            @endif
                        </td>
                        <td class="tablesaw-priority-2">
                            <a href="" class="btn btn-info">Edit</a>
                            <a href="" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection