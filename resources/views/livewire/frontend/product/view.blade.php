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
                    <div class="bg-white border productview-img">
                    @if($product->productImages)
                        <img src="{{ asset($product->productImages[0]->image)}}" class="" alt="Img">
                    @else
                    No Image
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
                            Home / {{$product->category->name}}  / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">₹{{$product->selling_price}}</span>
                            <span class="original-price">₹{{$product->original_price}}</span>
                        </div>
                        <div>
                            @if($product->productColors)
                                @foreach($product->productColors as $colorItem)
                                    <!-- <input type="radio" name="colorSelection" value="{{$colorItem->id}}">&nbsp;&nbsp;{{$colorItem->color->name}} -->
                                    <label class="colorSelectionLabel" style="background:{{$colorItem->color->code}}" wire:click="colorSelected({{$colorItem->id}})">
                                        {{$colorItem->color->name}}
                                    </label>
                                @endforeach
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity()"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity()"><i class="fa fa-plus"></i></span>
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
