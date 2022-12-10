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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                type="button" role="tab" aria-controls="color" aria-selected="false">Color</button>
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
                                <input type="text" name="name" value="{{$product->name}}"
                                    class="form-control  border border-dark">
                            </div>
                            <div class="mb-3">
                                <label> Product Slug </label>
                                <input type="text" name="slug" value="{{$product->slug}}"
                                    class="form-control  border border-dark">
                            </div>
                            <div class="mb-3">
                                <label> Select Brand </label>
                                <select name="brand" class="form-comtrol" id="">
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected':''}}>
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
                        <div class="tab-pane border py-3 my-3 fade" id="seotag" role="tabpanel"
                            aria-labelledby="seotag-tab">
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
                        <div class="tab-pane border py-3 my-3 fade" id="details" role="tabpanel"
                            aria-labelledby="details-tab">
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
                                        <input  type="checkbox" name="trending" 
                                            style="height:50px; width=50px" {{$product->trending == '1' ? 'Checked':''}}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Faetured </label>
                                        <input type="checkbox" name="featured" 
                                            style="height:50px; width=50px"  {{$product->featured == '1' ? 'Checked':''}}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label> Status </label>
                                        <input type="checkbox" name="status" style="height:50px; width=50px"  {{$product->status == '1' ? 'Checked':''}} >
                                    </div>
                                </div>
                                


                            </div>
                        </div>
                        <div class="tab-pane border py-3 my-3 fade" id="image" role="tabpanel"
                            aria-labelledby="image-tab">
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
                                            class="me-4" />
                                        <a href="{{url('admin/product-image/'.$image->id.'/delete')}}"
                                            class="d-block">Remove</a>
                                    </div>

                                    @endforeach
                                </div>

                                @else
                                <h5>No image Found</h5>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane border py-3 my-3 fade" id="color" role="tabpanel"
                            aria-labelledby="color-tab">
                            <div class="mb-3">
                                <label for="">Select colors</label>
                                <div class="row">
                                    @forelse($colors as $color)
                                    <div class="col-md-3">
                                        <div class="p-2 border mt-2" style="background-color: aliceblue;">
                                            Color: <input type="checkbox" name="colors[{{$color->id}}]"
                                                value="{{$color->id}}" class="">{{$color->name}}
                                            <br>
                                            Quantity : <input type="number" name="colorquantity[{{$color->id}}]"
                                                class="" style="width:60px">
                                        </div>

                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        No Colors Found
                                    </div>
                                    @endforelse
                                </div>


                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Color</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->productColors as $prodcolor)
                                        <tr class="product-color-tr">
                                            @if($prodcolor->color)
                                            <td>{{$prodcolor->color->name}}</td>
                                            @else
                                            Color Not Found
                                            @endif
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input type="text"
                                                        class=" productColorQuantity form-control form-control-sm"
                                                        style="width:60px" value="{{$prodcolor->quantity}}">
                                                    <button type="button"
                                                        class="btn  updateProductColorBtn btn-primary btn-sm text-white"
                                                        value="{{$prodcolor->id}}">Update</button>




                                                </div>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn deleteProductColorBtn mb-2  btn-danger btn-sm text-white"
                                                    value="{{$prodcolor->id}}">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <button class="btn btn-primary">Update</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.updateProductColorBtn', function () {


            var prod_color_id = $(this).val();
            var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();
            var product_id = "{{$product->id}}";
            // alert(qty);
            if (qty <= 0) {
                alert("Quantity required");
                return false;
            }
            var data = {
                'product_id': product_id,
                'qty': qty
            };
            $.ajax({
                type: "post",
                url: "/admin/product-color/" + prod_color_id,
                data: data,
                success: function (response) {
                        alert(response.message);
                }
            });


        });
    });

</script>
@endsection
