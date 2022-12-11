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
                    <a href="{{url('admin/users/create')}}" class="btn btn-primary btn-sm float-end">Add Users</a>
                </h3>

            </div>
            <div class="card-body">
                @if(session('message'))
                <h2>{{session('message') }}</h2>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            @php
                            $i=1;
                            @endphp
                            @forelse($users as $user)
                            <td>{{$i++}}</td>
                            <!-- to fetch names code added in product model with function category  -->


                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->role_as == 0)
                                <label class="badge btn-primary">User</label>
                                @elseif($user->role_as == 1)
                                <label class="badge btn-success">Admin</label>
                                @else
                                No role
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit')}}" class="btn btn-success">Edit</a>
                                <a href="{{ url('admin/users/'.$user->id.'/delete')}}"
                                    onclick="return confirm('Are you sure you want to delete ?') "
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <div colspan="5"> No Users Found</div>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
@endsection
