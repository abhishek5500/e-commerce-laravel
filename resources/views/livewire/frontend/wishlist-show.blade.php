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
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                              
                                <div class="col-md-4">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse($wishlist as $wishlistItems)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{url('collections/'.$wishlistItems->product->category->slug.'/'.$wishlistItems->product->slug)}}">
                                        <label class="product-name">
                                            <img src="{{asset($wishlistItems->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                            {{$wishlistItems->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{$wishlistItems->product->selling_price}}</label>
                                </div>
                                <div class="col-md-4 col-12 my-auto">
                                    <div class="remove">
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4>No wishlist added</h4>
                        @endforelse
                       
                                
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
