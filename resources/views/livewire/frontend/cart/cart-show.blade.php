<div>
<div class="py-3 py-md-5 bg-light">
        <div class="container">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse($carts as $cartsItems)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{url('collections/'.$cartsItems->product->category->slug.'/'.$cartsItems->product->slug)}}">
                                        <label class="product-name">
                                            @if($cartsItems->product->productImages)
                                                <img src="{{asset($cartsItems->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="" alt="">
                                            @endif
                                            {{$cartsItems->product->name}}
                                         
                                            @if($cartsItems->productColors)
                                                @if($cartsItems->productColors->color)
                                                <span>Color : {{$cartsItems->productColors->color->name}}</span>
                                                @endif
                                            @endif
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">₹{{$cartsItems->product->selling_price}}</label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button class="btn btn1" wire.loading.attr="disabled" wire:click="decrementQuantity({{$cartsItems->id}})"><i class="fa fa-minus"></i></button>
                                            <input type="text"  value="{{$cartsItems->quantity}}" readonly class="input-quantity" />
                                            <span class="btn btn1" wire.loading.attr="disabled" wire:click="incrementQuantity({{$cartsItems->id}})"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">₹{{$cartsItems->product->selling_price * $cartsItems->quantity}}</label>
                                
                                    @php $totalPrice += $cartsItems->product->selling_price * $cartsItems->quantity   @endphp

                                  
                                </div>
                               
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                    <button type="button" wire:click="removeCartItem({{$cartsItems->id}})" class="btn btn-danger btn-sm">
                                           <span wire:loading.remove wire:target="removeCartItem({{$cartsItems->id}})"> <i class="fa fa-trash"></i> Remove</span>
                                           <span wire:loading wire:target="removeCartItem({{$cartsItems->id}})"><i class="fa fa-trash"></i>Removing...</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4>No items  added in cart</h4>
                        @endforelse
                       
                                
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-8 my-md-auto">
                    <h3>Get the best Deals & Offers <a class="btn btn-primary" href="{{url('/collections')}}">Shop Now</a></h3>
                </div>
                <div class="col-md-4">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total :
                            <span class="float-end">₹{{$totalPrice}}</span>
                        </h4>
                        <hr>
                        <a href="{{url('/checkout')}}" class="btn btn-success w-100">Checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
