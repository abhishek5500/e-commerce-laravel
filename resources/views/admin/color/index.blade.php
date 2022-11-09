@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>Colors
                    <a href="{{url('admin/colors/create')}}" class="btn btn-primary btn-sm float-end">Add Colors</a>
                </h3>

            </div>
            <div class="card-body">
                @if(session('message'))
                    <h2>{{session('message') }}</h2>
                 @endif


                 <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            @php
                            $i=0;
                            @endphp
                            @foreach($colors as $color)
                            <td>{{++$i}}</td>
                            <td>{{$color->name}}</td>
                            <td>{{$color->code}}</td>
                            <td>{{$color->status == '1' ? 'Hiddenn': "Visible"}}</td>
                            <td>
                                <a href="{{url('admin/colors/'.$color->id.'/edit')}}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/colors/'.$color->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-danger">Delete</a>
                               
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
