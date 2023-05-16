@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            
        <div class="card">
            <div class="card-header">
                <h3>Posts
                    <a href="{{ url('admin/post/create') }}" class="btn btn-sm text-white btn-primary float-end">Add post</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Artist</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Release_year</th>
                            <th>Creation_year</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($collection as $item) --}}
                        <tr>
                            <td>

                            </td>
                        </tr>
                        {{-- @empty --}}
                        <tr>
                            <td>

                            </td>
                        </tr>   
                        {{-- @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection