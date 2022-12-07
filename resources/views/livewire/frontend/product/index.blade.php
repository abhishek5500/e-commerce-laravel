<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                @foreach($category->brands as $brandsItem)
                    <label for="" class="d-block">
                       
                        <input type="checkbox" wire:model="brandInputs" value="{{$brandsItem->name}}">&nbsp;&nbsp; {{$brandsItem->name}}
                 
                    </label>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">

                    <label for="" class="d-block">
                       
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="high-to-low">&nbsp;&nbsp;High To Low
                 
                    </label>
                    <label for="" class="d-block">
                       
                        <input type="radio" name="priceSort" wire:model="priceInputs" value="low-to-high">&nbsp;&nbsp;Low To High
                 
                    </label>
         
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $productItem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($productItem->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out Of Stock</label>
                            @endif
                            <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                <img class="p-2" src="{{asset($productItem->productImages[0]->image)}}"
                                    alt="{{$productItem->name}}">
                            </a>
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$productItem->brand}}</p>
                            <h5 class="product-name">
                                <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    {{$productItem->name}}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">₹{{$productItem->selling_price}}</span>
                                <span class="original-price">₹{{$productItem->original_price}}</span>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    No Products Available for {{$category->name}}
                </div>
                @endforelse
            </div>
        </div>
    </div>
