@extends('layouts.app')

@section('content')
    @section('title')
        {{$product->meta_title}}
    @endsection
    @section('meta_keyword')
        {{$product->meta_keyword}}
    @endsection
    @section('meta_description')
        {{$product->meta_description}}
    @endsection


    <div>
    <livewire:frontend.product.view :category="$category" :product="$product"/>
    </div>

@endsection