@extends('layouts.admin');

@section('content')
<div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Category
                            <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h3>

                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $category->name}}" class="form-control">
                                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" value="{{ $category->slug}}" class="form-control">
                                    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description"  class="form-control">{{ $category->description}}</textarea>
                                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Image</label>
                                    <input type="file" name="image" value="{{ $category->image}}" class="form-control">
                                    <img src="{{asset($category->image)}}" width="60px" height="60px">
                                    @error('image') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label><br>
                                    <input type="checkbox" {{ $category->status == '1' ? 'Checked':''}} name="status" >
                                    @error('status') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta title</label>
                                    <input type="text" value="{{ $category->meta_title}}" name="meta_title" class="form-control">
                                    @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta keyword</label>
                                    <input type="text" name="meta_keyword" value="{{ $category->meta_keyword}}" class="form-control">
                                    @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta description</label>
                                    <textarea  name="meta_description" rows="3" class="form-control"> {{ $category->meta_description}}</textarea>
                                    @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                   <button type="submit" class="btn btn-primary float-end">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
@endsection