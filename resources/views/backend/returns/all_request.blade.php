@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">All Return Requests</h3>
            <div class="row">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table product-overview" id="myTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                <tr>
                                    <td>{{ $item->order_date }} </td>
                                    <td>{{ $item->invoice_no }}</td>
                                    <td> ${{ $item->amount }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>
                                        @if($item->return_order == 1)
                                        <span class="label label-success font-weight-100">pending</span>
                                        @elseif($item->return_order == 2)
                                        <span class="label label-success font-weight-100">success</span>
                                        @endif

                                    </td>
                                    <td>
                                        <span class="badge badge-success">Return Approved</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links('vendor.pagination.custom')}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection