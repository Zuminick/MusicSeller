<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Genre Delete</h5>
              {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> --}}
            </div>
            <form wire:submit.prevent="destroyGenre">

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
                    <h3>Genre
                        <a href="{{ url('admin/genre/create') }}" class="btn btn-sm text-white btn-primary float-end">Add genre</a>
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
                            @forelse ($genres as $genre)
                                <tr>
                                    <td>{{ $genre->id }}</td>
                                    <td>{{ $genre->name }}</td>
                                    <td>
                                        <div class="float-end">
                                            <a href="{{ url('admin/genre/'.$genre->id.'/edit') }}" class="btn btn-success">
                                                <i class="bi bi-pencil-square"></i></a>
                                            <a href="#" wire:click='deleteGenre({{ $genre->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">
                                                <i class="bi bi-trash3-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <td colspan="2">No genres Available</td>
                                    </td>
                                </tr>   
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $genres->links() }}
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