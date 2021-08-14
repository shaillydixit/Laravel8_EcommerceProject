@extends('admin.master')
@section('content')
<br>

<div class="col-lg-12">
    <div class="white-box">
        <h3 class="box-title m-b-4">All Products</h3>
        <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Product Image</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Product Name</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Product Price</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Quantity</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Discount</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Status</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $row)
                <tr>
                    <td class="title"><img src="{{asset($row->product_thumbnail)}}" alt="" style="width:80px; height:50px;"></td>
                    <td class="title">{{$row->product_name}}</td>
                    <td class="title">{{$row->selling_price}}</td>
                    <td class="title">{{$row->product_quantity}} piece</td>
                    <td class="title">
                        @if($row->discount_price == NULL)
                        <span class="badge badge-pill badge-danger">No Discount</span>
                        @else
                        @php
                        $amount = $row->selling_price - $row->discount_price;
                        $discount = ($amount/$row->selling_price) * 100;
                        @endphp
                        <span class="badge badge-pill badge-danger">{{round($discount)}}%</span>
                        @endif
                    </td>
                    <td class="title">
                        @if($row->status == 1)
                        <span class="badge badge-pill badge-success">Active</span>
                        @else
                        <span class="badge badge-pill badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="title">
                        <a href="" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i></a>
                        <a href="{{route('edit.product', $row->id)}}" class="btn btn-info" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{route('delete.product', $row->id)}}" class="btn btn-sm btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i> </a>
                        @if($row->status == 1)
                        <a href="{{route('inactive.product', $row->id)}}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                        @else
                        <a href="{{route('active.product', $row->id)}}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection