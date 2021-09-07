@extends('admin.master')
@section('content')
<br>
<div class="container">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Processing Orders</h3>
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
                                    <td>${{ $item->amount }}</td>
                                    <td> <span class="label label-success font-weight-100">{{ $item->status }}</span> </td>
                                    <td><a href="{{route('pending.order.details', $item->id)}}" class="text-inverse p-r-10" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('invoice.download', $item->id)}}" class="text-inverse" title="Download Invoice" data-toggle="tooltip"><i class="ti-download"></i></a>
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