@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-12">
        <div class="white-box">
            <a href="{{route('add.admin')}}" class="btn btn-danger" style="float: right;">Add Admin User</a>
            <h3 class="box-title m-b-0">Admin Users</h3>
            <div class="row">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table product-overview" id="myTable">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Image</th>
                                    <th style="width: 10%;">Name</th>
                                    <th style="width: 25%;">Email</th>
                                    <th style="width: 30%;">Access</th>
                                    <th style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adminuser as $item)
                                <tr>
                                    <td style="width: 20%;"><img src="{{asset($item->profile_photo_path) }}" alt="" style="width: 80px; height:80px;"> </td>
                                    <td style="width: 10%;">{{ $item->name }}</td>
                                    <td style="width: 25%;">{{ $item->email }}</td>
                                    <td style="width: 30%;">
                                        @if($item->brand == 1)
                                        <span class="badge btn-primary">Brand</span>
                                        @else
                                        @endif

                                        @if($item->category == 1)
                                        <span class="badge btn-secondary">Category</span>
                                        @else
                                        @endif

                                        @if($item->product == 1)
                                        <span class="badge btn-success">Product</span>
                                        @else
                                        @endif

                                        @if($item->slider == 1)
                                        <span class="badge btn-danger">Slider</span>
                                        @else
                                        @endif

                                        @if($item->coupan == 1)
                                        <span class="badge btn-warning">Coupons</span>
                                        @else
                                        @endif

                                        @if($item->shipping == 1)
                                        <span class="badge btn-info">Shipping</span>
                                        @else
                                        @endif

                                        @if($item->blog == 1)
                                        <span class="badge btn-primary">Blog</span>
                                        @else
                                        @endif

                                        @if($item->setting == 1)
                                        <span class="badge btn-dark">Setting</span>
                                        @else
                                        @endif

                                        @if($item->returnorder == 1)
                                        <span class="badge btn-primary">Return Order</span>
                                        @else
                                        @endif

                                        @if($item->review == 1)
                                        <span class="badge btn-secondary">Review</span>
                                        @else
                                        @endif

                                        @if($item->orders == 1)
                                        <span class="badge btn-success">Orders</span>
                                        @else
                                        @endif

                                        @if($item->stock == 1)
                                        <span class="badge btn-danger">Stock</span>
                                        @else
                                        @endif

                                        @if($item->reports == 1)
                                        <span class="badge btn-warning">Reports</span>
                                        @else
                                        @endif

                                        @if($item->all_user == 1)
                                        <span class="badge btn-info">All User</span>
                                        @else
                                        @endif

                                        @if($item->admin_user_role == 1)
                                        <span class="badge btn-dark">Admin User Role</span>
                                        @else
                                        @endif
                                    </td>
                                    <td style="width: 15%;">
                                        <a href="{{route('edit.admin.user', $item->id)}}" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{route('delete.admin.user', $item->id)}}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection