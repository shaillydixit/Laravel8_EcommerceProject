@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-8">
        <div class="white-box">
            <div class="box-header">
                <h3 class="box-title m-b-0">All Blog Post</h3>
                <a href="{{route('add.blog.post')}}" class="btn btn-success" style="float: right; margin-bottom: 10px;">Add Post</a>
            </div>

            <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Blog Post Category</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Blog Post Image</th>
                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">Blog Post Title</th>

                        <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogpost as $row)
                    <tr>
                        <td class="tablesaw-priority-3">{{$row->blogcategory->blog_category_name}}</td>
                        <td class="tablesaw-priority-3"><img src="{{asset($row->post_image)}}" alt="" style="width:80px; height:50px;"></td>
                        <td class="title"><a href="javascript:void(0)"></a>{{$row->post_title}}</td>
                        <td class="tablesaw-priority-2">
                            <a href="{{route('edit.blog.post', $row->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.blog.post', $row->id)}}" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$blogpost->links('vendor.pagination.custom')}}
        </div>
    </div>
</div>

@endsection