@extends('layouts.admin');
@section('title')
Users
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>Users
                    <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/users')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Select Role</label>
                            <select name="role_as" class="form-control">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
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
@endsection
