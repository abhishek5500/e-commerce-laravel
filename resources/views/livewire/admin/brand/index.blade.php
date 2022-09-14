
<div>
@include('livewire.admin.brand.modal-form')
<div class="row">
    <div class="col-md-12 ">
      
        <div class="card">
            <div class="card-header">
                <h4>Brands
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end"data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brands</a>
                </h4>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                       <tr>
                           @forelse($brands as $brand)
                           <td>{{$brand->id}}</td>
                           <td>{{$brand->name}}</td>
                           <td>{{$brand->slug}}</td>
                           <td>{{$brand->status == '1' ? 'Hidden': "Visible"}}</td>
                           <td>
                               <a href="#" class="btn btn-success">Edit</a>
                               <a href="#"  data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
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
    })
</script>
@endpush