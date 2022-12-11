@extends('layouts.app')

@section('content')
    @section('title')
    My Profile
    @endsection
 

    <div class="py-5">
        <div class="container">
        @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            <div class="row">
                <div class="justify-content-center">
                    <div class="col-md-10">
                        <h4>Change Password
                            <a href="{{url('user-profile')}}" class="btn btn-warning float-end">Profile</a>
                        </h4>
                        <div class="underline  mb-4"></div>
                    </div>
                    <div class="col-md-10">
                    <div class="card shadow card-body">
                        <form action="{{url('change-password')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Current Password</label>
                                <input type="text" name="current_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">New Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="mb-3 text-end">
                                <hr>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection