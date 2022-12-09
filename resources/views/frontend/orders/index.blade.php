@extends('layouts.app')

@section('content')
    @section('title')
    My Orders
    @endsection
<div class="py-3 py-t-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <div class="bg-white shadow p-3">
                <h4 class="p-4">My Orders</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                           <tr>
                            <th>Order Id</th>
                            <th>Tracking No</th>
                            <th>Username</th>
                            <th>Payment Mode</th>
                            <th>Ordered Date</th>
                            <th>Status Message</th>
                            <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @forelse($orders as $orderItem)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$orderItem->tracking_no}}</td>
                            <td>{{$orderItem->full_name}}</td>
                            <td>{{$orderItem->payment_mode}}</td>
                            <td>{{$orderItem->created_at->format('d-m-Y')}}</td>
                            <td>{{$orderItem->status_message}}</td>
                            <td>
                                <a href="{{url('orders/'.$orderItem->id)}}"class="btn btn-success">View Order</a>
                             
                            </td>
                       
                          </tr>
                            @empty
                            <tr>
                            <td colspan="7">No Orders Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{$orders->links()}}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
