<div>
    <div class="py-3 py-md-5 productview">
        <div class="container">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border productview-img" wire:ignore>
                        @if($product->productImages)
                        <!-- <img src="{{ asset($product->productImages[0]->image)}}" class="" alt="Img"> -->
                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach($product->productImages as $prodimgItem)
                                    <li><img src="{{ asset($prodimgItem->image)}}" /></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                </a> <a href="javascript:void(0);" class="exzoom_next_btn">
                                </a>
                            </p>
                        </div>
                        @else
                        No Image Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                            @if($product->productColors->count() > 0)
                            @if($this->productColorSelectedQuantity == 'outofstock')
                            <label class="label-stock  px-4 py-2 m-1 bg-danger">Out Of Stock</label>
                            @elseif($this->productColorSelectedQuantity > 0)
                            <label class="label-stock  px-4 py-2 m-1 bg-success">In Stock</label>
                            @endif

                            @else
                            @if($product->quantity > 0)
                            <label class="label-stock  px-4 py-2 m-1 bg-success">In Stock</label>
                            @else
                            <label class="label-stock  px-4 py-2 m-1 bg-danger">Out Of Stock</label>
                            @endif
                            @endif
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">₹{{$product->selling_price}}</span>
                            <span class="original-price">₹{{$product->original_price}}</span>
                        </div>
                        <div>
                            @if($product->productColors)
                            @foreach($product->productColors as $colorItem)
                            <!-- <input type="radio" name="colorSelection" value="{{$colorItem->id}}">&nbsp;&nbsp;{{$colorItem->color->name}} -->
                            <label class="colorSelectionLabel" style="background:{{$colorItem->color->code}}"
                                wire:click="colorSelected({{$colorItem->id}})">
                                {{$colorItem->color->name}}
                            </label>
                            @endforeach
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity()"><i
                                        class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly
                                    class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity()"><i
                                        class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToCart">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </span>
                                <span wire:loading wire:target="addToCart">
                                    <i class="fa fa-shopping-cart"></i> Adding..
                                </span>
                            </button>
                            <button type="button" wire:click="addToWishlist({{$product->id}})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i>Adding..
                                </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->small_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Related
                    @if($category) {{$category->name}} @endif
                    Products</h4>
                <div class="underline mx-auto  mb-4"></div>
                <div class="row">
                    @forelse($category->relatedProducts as $relatedProductItem)

                    <div class="item col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">

                                <label class="stock bg-success">New</label>



                                <a
                                    href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                    <img class="p-2" src="{{asset($relatedProductItem->productImages[0]->image)}}"
                                        alt="{{$relatedProductItem->name}}">
                                </a>
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{$relatedProductItem->brand}}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                        {{$relatedProductItem->name}}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">₹{{$relatedProductItem->selling_price}}</span>
                                    <span class="original-price">₹{{$relatedProductItem->original_price}}</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    @empty
                </div>
                <div class="col-md-12">
                    <h4 class="p-2"> No Featured Products</h4>
                </div>
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{url('/collections')}}" class="btn btn-warning">View More</a>
            </div>
        </div>
    </div>
</div>

<div class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Related
                    @if($product) {{$product->brand}} @endif
                    Products
                </h4>
                <div class="underline mx-auto  mb-4"></div>
                <div class="row">
                    @forelse($category->relatedProducts as $relatedProductItem)
                    @if($relatedProductItem->brand == "$product->brand")
                    <div class="item col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">

                                <label class="stock bg-success">New</label>



                                <a
                                    href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                    <img class="p-2" src="{{asset($relatedProductItem->productImages[0]->image)}}"
                                        alt="{{$relatedProductItem->name}}">
                                </a>
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{$relatedProductItem->brand}}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                        {{$relatedProductItem->name}}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">₹{{$relatedProductItem->selling_price}}</span>
                                    <span class="original-price">₹{{$relatedProductItem->original_price}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
                    @empty
                </div>
                <div class="col-md-12">
                    <h4 class="p-2"> No Featured Products</h4>
                </div>
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{url('/collections')}}" class="btn btn-warning">View More</a>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function () {

        $("#exzoom").exzoom({

            // thumbnail nav options
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,

            // autoplay
            "autoPlay": false,

            // autoplay interval in milliseconds
            "autoPlayTimeout": 2000

        });

    });

</script>
@endpush
