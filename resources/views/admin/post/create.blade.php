@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Post
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
                
                <form action="{{ url('admin/post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                    <input type="integer" name="user_id" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Artist/Band name</label>
                                    <input type="text" name="artist" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Album name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Type</label>
                                    <select name="type_id" class="custom-select custom-select-lg mb-3 form-control">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Genre</label>
                                    <select name="genre_id" class="form-control">
                                        @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Release date of album/single</label>
                                        <select name="release_year" class="form-control">
                                            @for ($i = 1900; $i < 2024; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                </div>
                                <div class="mb-3">
                                    <label>Creation date of music storage</label>
                                    <select name="creation_year" class="form-control">
                                        @for ($i = 1900; $i < 2024; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Price</label>
                                        <div class="input-group-append">
                                            <input type="text" name="price" class="form-control " aria-label="Amount (to the nearest dollar)"/>
                                                <span class="input-group-text">$</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="20"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="images" role="tabpanel" aria-labelledby="images-tab">
                            <div class="mb-3">
                                <label>Upload image</label>
                                <input type="file"  name="image[]" multiple class="form-control">
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