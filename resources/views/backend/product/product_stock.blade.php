@extends('admin.master')
@section('content')
<br>

<div class="col-lg-12">
    <div class="white-box">
        <h3 class="box-title m-b-4">Product Stock</h3>
        <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-7981">
            <thead>
                <tr>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Product Image</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Product Name</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Product Price</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Quantity</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Discount</th>
                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist">Status</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection