@extends('layouts.admin');

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3>Products
                    <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm float-end">Add Products</a>
                </h3>

            </div>
            <div class="card-body">
            @if(session('message'))
                    <h2>{{session('message') }}</h2>
                 @endif
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
                       
                        <tr>
                            @php
                            $i=1;
                            @endphp
                            @forelse($products as $product)
                            <td>{{$i++}}</td>
                            <!-- to fetch names code added in product model with function category  -->
                    
                            <td>
                                @if($product->category)
                                    {{$product->category->name}}
                                @else
                                    No Category    
                                @endif
                            </td>
                            
                            <td>{{$product->name}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->status == '1' ? 'Hiddenn': "Visible"}}</td>
                            <td>
                                <a href="{{ url('admin/products/'.$product->id.'/edit')}}" class="btn btn-success">Edit</a>
                                <a href="{{ url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete ?') " class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <div colspan="7"> No Products Found</div>
                        </tr>
                        @endforelse
                    </tbody>
                
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
