<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Type Delete</h5>
            </div>
            <form wire:submit.prevent="destroytype">

                <div class="modal-body">
                    <h6>Are you sure?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
          </div>
        </div>
      </div>

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Type
                        <a href="{{ url('admin/type/create') }}" class="btn btn-sm text-white btn-primary float-end">Add type</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>
                                        <div class="float-end">
                                            <a href="{{ url('admin/type/'.$type->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="#" wire:click='deletetype({{ $type->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <td colspan="2">No types Available</td>
                                        </td>
                                    </tr>   
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $types->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

<script>
    window.addEventListener('close-modal', event => {

        $('#deleteModal').modal('hide');
    });
</script>

@endpush