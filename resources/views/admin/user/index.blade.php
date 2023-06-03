@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
            
        <div class="card">
            <div class="card-header">
                <h3>Users</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>role_as</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role_as }}</td>
                                <td>
                                    <div class="float-end">
                                        <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <a href=" {{ url('admin/user/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete the user?')" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    <td colspan="10">No Users Available</td>
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