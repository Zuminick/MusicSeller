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
                            <th>Genre</th>
                            <th>Creation_year</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->user_id }}</td>
                                <td>{{ $post->artist }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->type->name }}</td>
                                <td>{{ $post->genre->name }}</td>
                                <td>{{ $post->creation_year }}</td>
                                <td>{{ $post->price }}</td>
                                <td>{{ $post->status }}</td>
                                <td>
                                    <div class="float-end">
                                        <a href="{{ url('admin/post/'.$post->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <a href="#" wire:click='deletePost({{ $post->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    <td colspan="10">No Posts Available</td>
                                </td>
                            </tr>   
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection