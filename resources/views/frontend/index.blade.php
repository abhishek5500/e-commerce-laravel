@extends('layouts.app')

@section('content')
@section('title')
Home
@endsection


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">

        @foreach($sliders as $key=> $slider)

        <div class="carousel-item {{$key == 0 ? 'active':''}}">
            <img src="{{asset('/'.$slider->image)}}" class="d-block w-100" alt="..." height="545px">
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        <span>{{$slider->title}}
                    </h1>
                    <p>
                        {{$slider->description}}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Welcome to My E-Commerce</h4>
                <div class="underline mx-auto"></div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem voluptate earum tenetur eos, aperiam
                    natus tempora? Deleniti vel delectus veritatis incidunt soluta! Hic vitae vel optio eos, dolore
                    nobis sequi molestiae autem, impedit vero perferendis tenetur dolores provident, delectus corrupti?
                    At, architecto soluta iste eius voluptates deleniti. Esse est qui fugiat eligendi cupiditate, culpa
                    repellat iste. Nobis cumque veniam nemo.
                </p>
            </div>

        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
              <h4>Trending Products</h4>
                <div class="underline mx-auto  mb-4"></div>
              <div class=" owl-carousel owl-theme trending-products">
                @forelse($trendingProducts as $productItem)
  
                 <div class="item">
                  <div class="product-card">
                          <div class="product-card-img">

                              <label class="stock-arr-trnd bg-success">New</label>



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
                </div>
                <div class="col-md-12">
                    <h4 class="p-2"> No Trending Products</h4>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
<div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                @if($newProductsArrival)
                <h4>New Arrivals
                    <a href="{{url('/new-arrival')}}" class="btn btn-warning float-end">View More</a>
                </h4>
                    <div class="underline   mb-4"></div>
                <div class=" owl-carousel owl-theme new-arrival-prod">
                    @foreach($newProductsArrival as $productItem)

                    <div class="item">
                        <div class="product-card">
                            <div class="product-card-img">

                                <label class="stock-arr-trnd bg-success">New</label>



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
                    @endforeach
                   @else
                    </div>
                    <div class="col-md-12">
                        <h4 class="p-2"> No Trending Products</h4>
                    </div>
                  @endif
                </div>
             
            </div>
        </div>
</div>
<div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                <h4>Featured Products
                <a href="{{url('/featured')}}" class="btn btn-warning float-end">View More</a>
                </h4>
                    <div class="underline  mb-4"></div>
                <div class=" owl-carousel owl-theme featured-products">
                    @forelse($featuredProducts as $productItem)
    
                    <div class="item">
                    <div class="product-card">
                            <div class="product-card-img">

                                <label class="stock-arr-trnd bg-success">New</label>



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
@endsection
@section('scripts')
<script>
    $('.trending-products').owlCarousel({
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
    $('.featured-products').owlCarousel({
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
