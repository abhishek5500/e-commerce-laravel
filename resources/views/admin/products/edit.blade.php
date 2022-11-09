@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href="{{url('admin/products/')}}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>

            </div>
            @if(session('message'))
            <h2 class="alert alert-danger">{{session('message') }}</h2>
            @endif
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{url('admin/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs my-3" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag"
                                type="button" role="tab" aria-controls="seotag" aria-selected="false">SEO tags </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane border py-3 my-3 fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="mb-3 mt-2">
                                <label> Category </label>.
                                <select name="category_id" class="form-comtrol" id="">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id}}"
                                        {{$category->id == $product->category_id ? 'selected':''}}>
                                        {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label> Product Name </label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control  border border-dark">
                            </div>
                            <div class="mb-3">
                                <label> Product Slug </label>
                                <input type="text" name="slug" value="{{$product->slug}}" class="form-control  border border-dark">
                            </div>
                            <div class="mb-3">
                                <label> Select Brand </label>
                                <select name="brand" class="form-comtrol" id="">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id}}" {{$brand->name == $product->brand ? 'selected':''}}>
                                        {{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label> Small Description </label>
                                <textarea name="small_description" rows="3"
                                    class="form-control  border border-dark">{{$product->small_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label> Description </label>
                                <textarea name="description" rows="3"
                                    class="form-control  border border-dark">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane border py-3 my-3 fade" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                            <div class="mb-3">
                                <label> Meta Title </label>
                                <input type="text" name="meta_title" value="{{$product->meta_title}}"
                                    class="form-control  border border-dark">
                            </div>
                            <div class="mb-3">
                                <label> Meta Description </label>
                                <textarea name="meta_description" rows="3"
                                    class="form-control  border border-dark">{{$product->meta_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label> Meta Keyword </label>
                                <textarea name="meta_keyword" rows="3"
                                    class="form-control  border border-dark">{{$product->meta_keyword}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane border py-3 my-3 fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Original Price </label>
                                        <input type="text" name="original_price" value="{{$product->original_price}}"
                                            class="form-control  border border-dark">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Selling Price </label>
                                        <input type="text" name="selling_price" value="{{$product->selling_price}}"
                                            class="form-control  border border-dark">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Quantity </label>
                                        <input type="number" name="quantity" value="{{$product->quantity}}"
                                            class="form-control  border border-dark">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Trending </label>
                                        <input type="checkbox" name="trending" class="form-control  border border-dark"
                                            style="height:50px; width=50px" value="{{$product->trending}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Status </label>
                                        <input type="checkbox" name="status" class="form-control  border border-dark"
                                            style="height:50px; width=50px" value="{{$product->status}}">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="tab-pane border py-3 my-3 fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="mb-3">
                                <label for="">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control  border border-dark">
                            </div>
                            <div>
                            @if($product->productImages)
                            <div class="row">
                                @foreach($product->productImages as $image)
                                <div class="col-md-2">
                                    <img src="{{asset($image->image)}}" style="width:80px;height:80px;" 
                                        class="me-4"/>
                                        <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                </div>
                                   
                                @endforeach
                            </div>
                                
                            @else
                                <h5>No image Found</h5>
                                @endif
                            </div>
                        </div>

                        <button class="bt btn-primary">Update</button>

                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
