@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
            
        <div class="card">
            <div class="card-header">
                <h3>Wishlist of {{ $user->name }}</h3>
            </div>
            <div class="card-body">

                @if ($wishlist)
                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <h4>Artist</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>Name</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Action</h4>
                                    </div>
                                </div>
                            </div>

                            @foreach ($wishlist as $wish)
                            <div class="cart-item border">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{ asset($wish->post->postImages[0]->img_url) }}" style="width:60px; height:60px;" class="me-4 border" alt="img">
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <label class="artist">{{ $wish->post->artist}}</label>
                                    </div>
                                    <div class="col-md-4 my-auto">
                                        <label class="name">{{ $wish->post->name}}</label>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">{{ $wish->post->price}}$</label>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <a href=" {{ url('admin/'.$user->id.'/wishlist/'.$wish->post_id.'/delete') }}" class="btn btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                          

                                </div>
                            </div>      
                            @endforeach                  
                @else
                    <div class="col-md-12">
                        <h4 class="mb-4">Wishlist is empty</h4>
                    </div>
                @endif




                {{-- <table class="table table-bordered table-striped">
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
                </table> --}}
            </div>
        </div>
    </div>
</div>
@endsection