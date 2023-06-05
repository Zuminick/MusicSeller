@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Create a Post</h3>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <form action="{{ url('post') }}" method="POST" enctype="multipart/form-data">
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
                                                <label>Artist/Band name</label>
                                                <input type="text" name="artist" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label>Album name</label>
                                                <input type="text" name="name" class="form-control" />
                                            </div>
        
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <label>Type</label>
                                                        <select name="type_id" class="custom-select custom-select-lg mb-3 form-control">
                                                            @foreach ($types as $type)
                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm">
                                                        <label>Genre</label>
                                                        <select name="genre_id" class="form-control">
                                                            @foreach ($genres as $genre)
                                                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm">
                                                        <label>Creation date</label>
                                                        <select name="creation_year" class="form-control">
                                                            @for ($i = 1900; $i < 2024; $i++)
                                                                    <option value="{{ $i }}" selected="2023">{{ $i }}</option>
                                                                @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-3 mx-auto">
                                                <label class="me-2">Price</label>
                                                <div class="input-group d-flex align-items-center">
                                                  <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)"/>
                                                  <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                              
                                        </div>
                                    </div>
                                    <div class="tab-pane fade border p-3" id="description" role="tabpanel" aria-labelledby="description-tab">
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade border p-3" id="images" role="tabpanel" aria-labelledby="images-tab">
                                        <div class="mb-3">
                                            <label>Upload image</label>
                                            <input type="file"  name="image[]" multiple class="form-control">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary bg-color-red1">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection