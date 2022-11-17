@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>Edit Slider
                    <a href="{{url('admin/sliders')}}" class="btn btn-primary btn-sm float-end">Back </a>
                </h3>

            </div>
            <div class="card-body">
                 @if(session('message'))
                    <h2>{{session('message') }}</h2>
                 @endif
              
                       
                 <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value='{{$slider->title}}' class="form-control">
                                    @error('title') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="3"> {{$slider->description}}</textarea>
                                    @error('code') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Image</label>
                                    <input type="file" name="image" value="{{ $slider->image}}" class="form-control">
                                    <img src="{{asset('/'.$slider->image)}}" width="60px" height="60px">
                                    @error('image') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label><br>
                                    <input type="checkbox" name="status" {{ $slider->status == '1' ? 'Checked':''}} >
                                    @error('status') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            
                                <div class="col-md-12 mb-3">
                                   <button type="submit" class="btn btn-primary float-end">Save</button>
                                </div>
                            </div>
                        </form>
            </div>

        </div>
    </div>
</div>
@endsection
