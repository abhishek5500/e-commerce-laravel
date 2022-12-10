@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href="{{url('admin/products')}}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>

            </div>
    
            <div class="card-body">
            @if(session('message'))
                    <h2>{{session('message') }}</h2>
                 @endif
                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#image"
                                type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="product-color" data-bs-toggle="tab" data-bs-target="#colors"
                                type="button" role="tab" aria-controls="colors" aria-selected="false">Colors</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane py-3 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-3 mt-2">
                                <label> Category </label>.
                                <select name="category_id" class="form-comtrol" id="">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>  Product Name </label>
                                <input type="text" name="name" class="form-control border border-dark mt-2">
                            </div>
                            <div class="mb-3">
                                <label> Product Slug </label>
                                <input type="text" name="slug" class="form-control border border-dark mt-2">
                            </div>
                            <div class="mb-3">
                                <label> Select Brand </label>
                                <select name="brand" class="form-comtrol" id="">
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label> Small Description </label>
                                <textarea name="small_description" rows="3" class="form-control border border-dark mt-2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label> Description </label>
                                <textarea name="description" rows="3" class="form-control border border-dark mt-2"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane py-3 fade" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                            <div class="mb-3">
                                <label> Meta Title </label>
                                <input type="text" name="meta_title" class="form-control border border-dark mt-2">
                            </div>
                            <div class="mb-3">
                                <label> Meta Keyword </label>
                                <textarea name="meta_keyword" rows="3" class="form-control border border-dark mt-2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label> Meta description </label>
                                <textarea name="meta_description" rows="3" class="form-control border border-dark mt-2"></textarea>
                            </div>
                           
                        </div>
                        <div class="tab-pane py-3 fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Original Price </label>
                                        <input type="text" name="original_price" class="form-control border border-dark mt-2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Selling Price </label>
                                        <input type="text" name="selling_price" class="form-control border border-dark mt-2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Quantity </label>
                                        <input type="number" name="quantity" class="form-control border border-dark mt-2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Trending </label>
                                        <input type="checkbox" name="trending" 
                                            style="height:50px; width:50px">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Featured </label>
                                        <input type="checkbox" name="featured" 
                                            style="height:50px; width:50px">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Status </label>
                                        <input type="checkbox" name="status"
                                            style="height:50px; width:50px" >
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="tab-pane py-3 fade" id="image" role="tabpanel" aria-labelledby="product-color">
                            <div class="mb-3">
                                <label for="">Upload Product image</label>
                                <input type="file" name="image[]" multiple class="form-control border border-dark mt-2">
                            </div>
                        </div>
                        <div class="tab-pane py-3 fade" id="colors" role="tabpanel" aria-labelledby="product-color">
                            <div class="mb-3">
                                <label for="">Select colors</label>
                                <div class="row">
                                    @foreach($colors as $color)
                                    <div class="col-md-3" >
                                        <div class="p-2 border mt-2" style="background-color: aliceblue;">
                                        Color: <input type="checkbox" name="colors[{{$color->id}}]" value="{{$color->id}}" class="">{{$color->name}}
                                        <br>
                                        Quantity :  <input type="number" name="colorquantity[{{$color->id}}]" class="" style="width:60px">
                                        </div>
                                    
                                    </div>
                                    @endforeach
                                </div>
                               
                            </div>
                        </div>
                    
                            <button class="bt btn-success px-4 py-2">Submit</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
