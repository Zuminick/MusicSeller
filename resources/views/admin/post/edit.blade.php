@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Post
                    <a href="{{ url('admin/posts') }}" class="btn btn-danger btn-sm text-white btn-primary float-end">back</a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                
                <form action="{{ url('admin/post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="details-tab" data-bs-toggle="tab" href="#details" type="button" role="tab" aria-controls="details" aria-selected="true">
                                Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="description-tab" data-bs-toggle="tab" href="#description" type="button" role="tab" aria-controls="description" aria-selected="false">
                                Description
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" role="tab" type="button" aria-controls="images" aria-selected="false">
                                Images
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div>
                                <div class="mb-3">
                                    <label>User ID</label>
                                    <input type="integer" name="user_id" value="{{ $post->user_id }}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Artist/Band name</label>
                                    <input type="text" name="artist" value="{{ $post->artist }}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Album name</label>
                                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" />
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="mb-3 col-sm">
                                            <label>Type</label>
                                            <select name="type_id" class="custom-select custom-select-lg mb-3 form-control">
                                                @foreach ($types as $type)
                                                <option value="{{ $type->id }}" {{ $type->id == $post->type_id ? 'selected':'' }}>{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-sm">
                                            <label>Genre</label>
                                            <select name="genre_id" class="form-control">
                                                @foreach ($genres as $genre)
                                                <option value="{{ $genre->id }}" {{ $genre->id == $post->genre_id ? 'selected':'' }}>{{ $genre->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-sm">
                                            <label>Creation date of music storage</label>
                                            <select name="creation_year" class="form-control">
                                                @for ($i = 1900; $i < 2024; $i++)
                                                    <option value="{{ $i }} " {{ $i == $post->creation_year ? 'selected':'' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Price</label>
                                        <div class="input-group-append">
                                            <input type="text" name="price" value="{{ $post->price }}" class="form-control " aria-label="Amount (to the nearest dollar)"/>
                                                <span class="input-group-text">$</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="20">{{ $post->description }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="images" role="tabpanel" aria-labelledby="images-tab">
                            <div class="mb-3">
                                <label>Upload image</label>
                                <input type="file"  name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                @if($post->PostImages)
                                <div class="row">
                                    @foreach ($post->PostImages as $image)
                                    <div class="col-md-2">
                                        <img src="{{ asset($image->img_url) }}" style="width:80px; height:80px;" class="me-4 border" alt="img">
                                        <a href="{{ url('admin/post-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                    </div>
                                    @endforeach
                                </div>


                                @else
                                <h5>No images found</h5>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection