@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit User
                    <a href="{{ url('admin/user/create') }}" class="btn btn-sm text-white btn-primary float-end">back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/user/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="container">
                        <div class="row">
                            <div class="mb-3 col-sm">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="mb-3 col-sm">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                            
                            <div class="mb-3 col-sm">
                                <label>is Admin</label>
                                <input type="integer" name="role_as" value="{{ $user->role_as }}" class="form-control">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection