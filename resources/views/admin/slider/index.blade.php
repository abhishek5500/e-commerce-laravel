@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>Sliders
                    <a href="{{url('admin/sliders/create')}}" class="btn btn-primary btn-sm float-end">Add Sliders</a>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                        @foreach($sliders as $slider)
                        <td>{{$slider->id}}</td>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->description}}</td>
                        <td><img src="{{asset('/'.$slider->image)}}" alt="" style="width:80px;height:80px;"></td>
                        <td>{{$slider->status == 0 ? "Visible":"Hidden"}}</td>
                        <td>
                            <a href="{{url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{url('admin/sliders/'.$slider->id.'/delete')}}"  onclick="return confirm('Are you sure you want to delete ?') " class="btn btn-sm btn-danger">Delete</a>
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
