
<div>
@include('livewire.admin.brand.modal-form')
<div class="row">
    <div class="col-md-12 ">
      
        <div class="card">
            <div class="card-header">
                <h4>Brands
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brands</a>
                </h4>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                       <tr>
                        @php
                         $i=0;
                        @endphp
                           @forelse($brands as $brand)
                           <td>{{++$i}}</td>
                           <td>{{$brand->name}}</td>
                           <td>
                                @if($brand->category) 
                                    {{$brand->category->name}}
                                @else
                                    No Category
                                @endif
                            </td>
                           <td>{{$brand->slug}}</td>
                           <td>{{$brand->status == '1' ? 'Hidden': "Visible"}}</td>
                           <td>
                               <a href="#" wire:click="editBrand({{$brand->id}})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateBrandModal">Edit</a>
                               <a href="" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-danger">Delete</a>
                           </td>
                       </tr>
                        @empty
                            <tr>
                                <td colspan="5">No data Found</td>
                            </tr>
                        @endforelse
                   </tbody>
                
                </table>
            </div>
            <div>
                {{$brands->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@push('script')

<script>
    window.addEventListener('close-modal', event =>{
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    })
</script>
@endpush