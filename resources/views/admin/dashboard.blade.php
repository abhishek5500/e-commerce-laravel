@extends('layouts.admin');

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
      <div class="me-md-3 me-xl-5">
            @if(session('message'))
            <h2>{{session('message') }}</h2>
            @endif
            <div class="me md-3 e-xl-5">
                <h2>Dasboard</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
            </div>
            <hr>
        </div>
    </div>
</div>
<div class="row">
  <h3 claa="p-3 m-2">Orders</h3>
  <div class="col-md-3">
    <div class="card card-body bg-success text-white mb-3">
      <label for="">Total Orders</label>
      <h1>{{$orders->count()}}</h1>
      <a href="{{url('admin/orders')}}" class="text-white">View</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-success text-white mb-3">
      <label for="">Today Orders</label>
      <h1>{{$todayorders->count()}}</h1>
      <a href="{{url('admin/orders')}}" class="text-white">View</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-success text-white mb-3">
      <label for="">Month Orders</label>
      <h1>{{$monthorders->count()}}</h1>
      <a href="{{url('admin/orders')}}" class="text-white">View</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-success text-white mb-3">
      <label for="">Year Orders</label>
      <h1>{{$yearorders->count()}}</h1>
      <a href="{{url('admin/orders')}}" class="text-white">View</a>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <h3 claa="p-3 m-2">Products</h3>
  <div class="col-md-3">
    <div class="card card-body bg-primary text-white mb-3">
      <label for="">Total Products</label>
      <h1>{{$products->count()}}</h1>
      <a href="{{url('admin/products')}}" class="text-white">View</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-primary text-white mb-3">
      <label for=""> Categories</label>
      <h1>{{$category->count()}}</h1>
      <a href="{{url('admin/category')}}" class="text-white">View</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-primary text-white mb-3">
      <label for=""> Brands</label>
      <h1>{{$brands->count()}}</h1>
      <a href="{{url('admin/brands')}}" class="text-white">View</a>
    </div>
  </div>

</div>
<div class="row">
  <h3 claa="p-3 m-2">Users</h3>
  <div class="col-md-3">
    <div class="card card-body bg-warning text-white mb-3">
      <label for="">Total Users</label>
      <h1>{{$allusers->count()}}</h1>
      <a href="{{url('admin/users')}}" class="text-white">View</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-warning text-white mb-3">
      <label for="">Total Customers</label>
      <h1>{{$customers->count()}}</h1>
      <a href="{{url('admin/users')}}" class="text-white">View</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-body bg-warning text-white mb-3">
      <label for=""> Total Admins</label>
      <h1>{{$alladmins->count()}}</h1>
      <a href="{{url('admin/users')}}" class="text-white">View</a>
    </div>
  </div>

</div>
<hr>



@endsection
