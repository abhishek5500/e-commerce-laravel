@extends('layouts.app')

@section('content')
@section('title')
Search Products
@endsection
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if($searchProducts)
                <h4>Your Search Results</h4>
                <div class="underline mx-auto  mb-4"></div>

                @foreach($searchProducts as $productItem)
                
                <div class="col-md-8 mx-auto">
                    <div class="product-card">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-card-img">
                                    <label class="stock bg-success">New</label>
                                    <a
                                        href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        <img class="p-2" src="{{asset($productItem->productImages[0]->image)}}"
                                            alt="{{$productItem->name}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-card-body">
                                    <p class="product-brand">{{$productItem->brand}}</p>
                                    <h5 class="product-name">
                                        <a
                                            href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
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
                    </div>
                </div>
                @endforeach
                @else
                </div>
                <div class="col-md-12">
                    <h4 class="p-2"> No  Products</h4>
                </div>
                @endif
                <div>
                    @if($searchProducts)
                        {{$searchProducts->appends(request()->input())->links()}}
                    
                    @endif
                </div>

            <div class="text-center">
                <a href="{{url('/collections')}}" class="btn btn-warning">View More</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.new-arrival-prod').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

</script>
@endsection
