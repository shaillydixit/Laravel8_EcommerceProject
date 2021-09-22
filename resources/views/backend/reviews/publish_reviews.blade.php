@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Published Reviews</h3>
            <div class="row">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table product-overview" id="myTable">
                            <thead>
                                <tr>
                                    <th>Summary</th>
                                    <th>Comment</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($review as $item)
                                <tr>
                                    <td>{{ $item->summary }} </td>
                                    <td>{{ $item->comment }}</td>
                                    <td> {{ $item->user->name }}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>
                                        @if($item->status == 0)
                                        <span class="label label-success font-weight-100">pending</span>
                                        @elseif($item->status == 1)
                                        <span class="label label-success font-weight-100">Published</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{route('review.delete', $item->id)}}" class="btn btn-danger" id="delete" data-toggle="tooltip" title="View">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$review->links('vendor.pagination.custom')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection