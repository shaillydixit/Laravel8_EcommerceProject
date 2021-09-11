@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<!-- Main content -->

<div class="container">
    <div class="col-lg-12">
        <div class="white-box">
            <section class="content">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Shipping Details
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th> Shipping Name : </th>
                                            <th> {{ $order->first_name }} </th>
                                        </tr>

                                        <tr>
                                            <th> Shipping Phone : </th>
                                            <th> {{ $order->shipping_phone }} </th>
                                        </tr>

                                        <tr>
                                            <th> Shipping Email : </th>
                                            <th> {{ $order->shipping_email }} </th>
                                        </tr>

                                        <tr>
                                            <th> Division : </th>
                                            <th> {{ $order->division->division_name }} </th>
                                        </tr>

                                        <tr>
                                            <th> District : </th>
                                            <th> {{ $order->district->district_name }} </th>
                                        </tr>

                                        <tr>
                                            <th> State : </th>
                                            <th>{{ $order->state->state_name }} </th>
                                        </tr>

                                        <tr>
                                            <th> Post Code : </th>
                                            <th> {{ $order->shipping_zipcode }} </th>
                                        </tr>

                                        <tr>
                                            <th> Order Date : </th>
                                            <th> {{ $order->order_date }} </th>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Order Details
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th> Name : </th>
                                            <th> {{ $order->user->name }} </th>
                                        </tr>

                                        <tr>
                                            <th> Phone : </th>
                                            <th> {{ $order->user->phone }} </th>
                                        </tr>

                                        <tr>
                                            <th> PaymentType : </th>
                                            <th> {{ $order->payment_method }} </th>
                                        </tr>

                                        <tr>
                                            <th> Trans. ID : </th>
                                            <th> {{ $order->transaction_id }} </th>
                                        </tr>

                                        <tr>
                                            <th> Order No : </th>
                                            <th> {{ $order->order_number }} </th>
                                        </tr>

                                        <tr>
                                            <th> Invoice : </th>
                                            <th class="text-danger"> {{ $order->invoice_no }} </th>
                                        </tr>

                                        <tr>
                                            <th> Order Total : </th>
                                            <th>{{ $order->amount }} </th>
                                        </tr>

                                        <tr>
                                            <th> Order : </th>
                                            <th>
                                                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
                                            </th>
                                        </tr>  
                                        <tr>
                                            <th> </th>
                                            <th>
                                                @if($order->status == 'pending')
                                                <a href="{{ route('pending.confirm',$order->id) }}" class="btn btn-block btn-info" style="color: white;" id="confirm">Confirm Order</a>
                                                @elseif($order->status == 'confirmed')
                                                <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-info" style="color: white;" id="processing">Processing Order</a>
                                                @elseif($order->status == 'processing')
                                                <a href="{{ route('processing.pickedup',$order->id) }}" class="btn btn-block btn-info" style="color: white;" id="pickedup">PickedUp Order</a>
                                                @elseif($order->status == 'pickedup')
                                                <a href="{{ route('pickedup.shipped',$order->id) }}" class="btn btn-block btn-info" style="color: white;" id="shipped">Shipped Order</a>
                                                @elseif($order->status == 'shipped')
                                                <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-info" style="color: white;" id="delivered">Delivered Order</a>
                                                @endif
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Product Details
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orderItem as $item)
                                            <tr>
                                                <td><img src="{{ asset($item->product->product_thumbnail) }}" height="50px;" width="50px;"></td>
                                                <td>{{ $item->product->product_name }}</td>
                                                <td>{{ $item->product->product_code }}</td>
                                                <td>{{ $item->color }}</td>
                                                <td>{{ $item->size }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>$ {{ $item->price * $item->qty}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. end row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>

@endsection