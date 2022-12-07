@extends('layouts.app')

@section('content')
    @section('title')
        {{$category->meta_title}}
    @endsection
    @section('meta_keyword')
        {{$category->meta_keyword}}
    @endsection
    @section('meta_description')
        {{$category->meta_description}}
    @endsection

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
              <livewire:frontend.product.index :category="$category"/>
            
            </div>
        </div>
    </div>
@endsection