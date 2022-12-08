@extends('layouts.app')

@section('content')
    @section('title')
    Thank You for Shopping
    @endsection
<div class="py-3 py-t-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <div class="card card-body shadow text-center">
                <h4 class="p-4">Thank You For Shopping </h4>
                <a href="{{url('/collections')}}" class="btn btn-warning w-100">Shop More...</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
