<?php
    $orders = auth()->user()->orders;
?>
@extends('layouts.user.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
">

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center " style="font-size:16px;">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Payment Varification Pending Orders</div>
                        <div class="card-body">
                            <div class="x_content">
                                @if(isset($orders) && !$orders->isEmpty())
                                <table id="varification_pending" class="table table-striped table-bordered"
                                    style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>Order Date</th>
                                            <th>Order ID</th>
                                            <th>No of Products</th>
                                            <th>Trx ID</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        @if($order->status == 'Processing' )
                                        <tr>
                                            <td>{{$order->created_at->toDateTimeString()}}</td>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->orderDetails->sum('quantity')}}</td>
                                            <td>{{$order->trx_id}}</td>
                                            <td>{{$order->note ?? 'N/A'}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>
                                                <a style="font-size:14px;margin:5px" href="{{route('order.details',$order->id)}}" class="btn btn-success">View Details</a>

                                                <a style="font-size:14px;" href="{{route('user.cancel.order',$order->id)}}" class="btn btn-success">Cancel Order</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="alert alert-alert">No Orders Found</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Payment Varified Orders</div>
                <div class="card-body">
                    <div class="x_content">
                        @if(isset($orders) && !$orders->isEmpty())
                        <table id="payment_varified" class="table table-striped table-bordered"
                            style="text-align:center; font-size:18px;">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Order ID</th>
                                    <th>No of Products</th>
                                    <th>Total Amount</th>
                                    <th>Total Paid</th>
                                    <th>Trx ID</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                @if($order->status == 'Payment Varified' || $order->status == 'Cash on Delivery')
                                <tr>
                                    <td>{{$order->created_at->toDateTimeString()}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->orderDetails->sum('quantity')}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->paid}}</td>
                                    <td>{{$order->trx_id}}</td>
                                    <td>{{$order->note ?? 'N/A'}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>
                                        <a style="font-size:14px;margin:5px" href="{{route('order.details',$order->id)}}" class="btn btn-success">View Details</a>
                                        <a style="font-size:14px;" href="{{route('user.cancel.order',$order->id)}}" class="btn btn-success">Cancel Order</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-alert">No Orders Found</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Processed Orders</div>
                <div class="card-body">
                    <div class="x_content">
                        @if(isset($orders) && !$orders->isEmpty())
                        <table id="order_processed" class="table table-striped table-bordered  table-responsive"
                            style="text-align:center;">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Order ID</th>
                                    <th>No of Products</th>
                                    <th>Total Amount</th>
                                    <th>Total Paid</th>
                                    <th>Trx ID</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                @if($order->status == 'Order Processed:Full' || $order->status == 'Order Processed:Partial')
                                <tr>
                                    <td>{{$order->created_at->toDateTimeString()}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->orderDetails->sum('quantity')}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->paid}}</td>
                                    <td>{{$order->trx_id}}</td>
                                    <td>{{$order->note ?? 'N/A'}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>
                                        <a href="{{route('order.details',$order->id)}}" class="btn btn-success">View
                                            Details</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-alert">No Orders Found</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    var $ = jQuery;
        $('#varification_pending').DataTable({
            lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
            order: [0,'desc']
        });
        $('#order_processed').DataTable({
            lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
            order: [0,'desc']
        });
        $('#canceled_orders').DataTable({
            lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]],
            order: [0,'desc']
        });

</script>
@endsection
