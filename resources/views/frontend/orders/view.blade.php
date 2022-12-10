@extends('layouts.app')

@section('content')
    @section('title')
    Orders View
    @endsection
<div class="py-3 py-t-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
            <div class="bg-white shadow p-3">
                <h4 class="">
                    <i class="fa fa-shopping-cart text-dark"></i>My Orders Details
                    <a href="{{url('orders')}}" class="btn btn-danger float-end">Back</a>
                    <a href="{{url('orders/invoice/'.$order->id.'/generate')}}" class="btn btn-primary float-end mx-3">Download Invoice</a>
                    <a href="{{url('orders/invoice/'.$order->id)}}" target="_blank" class="btn btn-success float-end mx-3">View Invoice</a>
                </h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Order Details</h4>
                        <hr>
                        <h6>Order Id : {{$order->id}}</h6>
                        <h6>Tracking Id : {{$order->tracking_no}}</h6>
                        <h6>Order Created at : {{$order->created_at->format('d-m-Y')}}</h6>
                        <h6>Payment Mode : {{$order->payment_mode}}</h6>
                        <h6 class="border p-2 text-success">
                            Order Status : <span class="text-uppercase"> {{$order->status_message}}</span>
                        </h6>
                    </div>
                    <div class="col-md-6">
                    <h4>User Details</h4>
                        <hr>
                        <h6>Full Name : {{$order->full_name}}</h6>
                        <h6>Email Id : {{$order->email}}</h6>
                        <h6>Phone : {{$order->phone}}</h6>
                        <h6>Pincode : {{$order->pincode}}</h6>
                        <h6>Address : {{$order->address}}</h6>
                    </div>
                </div>
                <br>
                <h5>Order Items</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                            <th>Item Id</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                           
                           </tr>
                        </thead>
                        <tbody>
                            @php 
                            $i=0; 
                            $totalPrice=0; 
                            
                            @endphp
                            @foreach($order->orderItems as $orderItem)
                          <tr>
                            <td width="10%">{{++$i}}</td>
                            <td width="10%">
                                @if($orderItem->product->productImages)
                                    <img src="{{asset($orderItem->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                @else
                                    <img src="" alt="">
                                @endif
                                
                            </td>
                            <td width="10%">
                                {{$orderItem->product->name}}
                                
                                @if($orderItem->productColors)
                                    @if($orderItem->productColors->color)
                                    <span>Color : {{$orderItem->productColors->color->name}}</span>
                                    @endif
                                @endif
                            </td>
                            <td width="10%">₹{{$orderItem->price}}</td>
                            <td width="10%">{{$orderItem->quantity}}</td>
                            <td width="10%" class="fw-bold">₹{{$orderItem->quantity * $orderItem->price}}</td>
                           
                            @php 
                          
                             $totalPrice += $orderItem->quantity * $orderItem->price; 
                            
                            @endphp
                            
                       
                          </tr>
                           
                            @endforeach
                            <tr>
                                <td colspan="5" class="fw-bold"><h4>Total Amount :</h4></td>
                                <td colspan="1" class="fw-bold"><h5>₹{{$totalPrice}}</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
