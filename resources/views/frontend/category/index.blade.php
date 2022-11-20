@extends('layouts.app')

@section('content')
    @section('title')
    Collections
    @endsection

<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse($categories as $categoryItem)
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{url('/collections/'.$categoryItem->slug)}}">
                            <div class="category-card-img">
                                <img src="{{$categoryItem->image}}" class="w-100" alt="Laptop">
                            </div>
                            <div class="category-card-body">
                                <h5 class="text-center" >{{$categoryItem->name}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    No Collections Available.
                </div>
                @endforelse
            
               
            </div>
        </div>
    </div>

    @endsection