@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Genre
                    <a href="{{ url('admin/genre/create') }}" class="btn btn-sm text-white btn-primary float-end">back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/genre/'.$genre->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $genre->name }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection