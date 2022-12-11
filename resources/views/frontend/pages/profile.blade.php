@extends('layouts.app')

@section('content')
    @section('title')
    My Profile
    @endsection

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="justify-content-center">
                    <div class="col-md-10">
                        <h4>User Profile
                            <a href="{{url('change-password')}}" class="btn btn-warning float-end">Change Password</a>
                        </h4>
                        <div class="underline  mb-4"></div>
                    </div>
                    <div class="col-md-10">
                    <div class="card">
                            <div class="card-header">
                                <h3>Users Details
                                    <a href="{{url('/')}}" class="btn btn-danger btn-sm float-end">Back</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('user-profile')}}" method="post">
                                    @csrf
                               
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">User Name</label>
                                            <input type="text" value="{{Auth::user()->name}}"  class="form-control" name="name">
                                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="text" value="{{Auth::user()->email}}" readonly  class="form-control" name="email" >
                                            @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text"  class="form-control"  name="phone" value="{{Auth::user()->userDetails->phone ?? ''}}">
                                            @error('phone') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Pincode </label>
                                            <input type="text"   class="form-control" name="pincode" value="{{Auth::user()->userDetails->pincode ?? ''}}">
                                            @error('pincode') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Address </label>
                                            <textarea  class="form-control" name="address">{{Auth::user()->userDetails->address ?? ""}} </textarea>
                                            @error('address') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>
                                        
                                        <div class="col-md-12 text-end">
                                            <button  type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection