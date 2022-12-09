@extends('layouts.admin');

@section('content')
<div class="py-3 py-t-md-4">
<div class="container">
    <div class="row">
        <h3>Filter</h3>
        <div class="card-body bg-white shadow">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <label class="m-2 p-2 fw-bold">Filter By Date</label>
                        <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="m-2 p-2 fw-bold">Filter By Status</label>
                        <select name="status" id="form-select" class="py-2 px-4 text-left">
                            <option value="">Select All Status</option>
                            <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected':''}} >In Progress</option>
                            <option value="completed" {{Request::get('status') == 'completed' ? 'selected':''}} >Completed</option>
                            <option value="pending" {{Request::get('status') == 'pending' ? 'selected':''}} >Pending</option>
                            <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected':''}} >Cancelled</option>
                            <option value="out for delivery" {{Request::get('status') == 'out for delivery' ? 'selected':''}} >Out for Delivery</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <button type="submit" class=" mt-4 btn btn-primary">Filter Orders</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="py-3 py-t-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <div class="bg-white shadow p-3">
                <h3 class="p-4">My Orders</h3>
                <hr>
             
                <div class="table-responsive shadow">
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
                            <td class="text-uppercase">{{$orderItem->status_message}}</td>
                            <td>
                                <a href="{{url('admin/orders/'.$orderItem->id)}}"class="btn btn-success">View Order</a>
                             
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