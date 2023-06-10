@extends('layouts.app')

@section('title', 'Home Page')

@section('content')


<div class="container">
    <div class="row">
        <div class="py-6 py-md-4 bg-light">    
            <div class="position-fixed pr-6 mr-6" style="top: 50%; transform: translateY(-50%); left: 0;">
                <div class="btn-group-vertical">
                  <button class="btn btn-primary d-flex flex-column align-items-center border red-hover-btn">
                    <i class="bi bi-music-note" style="font-size: 48px;"></i>
                    All
                  </button>
                  <button class="btn btn-primary d-flex flex-column align-items-center border red-hover-btn">
                    <i class="bi bi-disc-fill" style="font-size: 48px;"></i>
                    CD-disk
                  </button>
                  <button class="btn btn-primary d-flex flex-column align-items-center border red-hover-btn">
                    <i class="bi bi-vinyl-fill" style="font-size: 48px;"></i>
                    Vinyl
                  </button>
                  <button class="btn btn-primary d-flex flex-column align-items-center border red-hover-btn">
                    <i class="bi bi-cassette-fill" style="font-size: 48px;"></i>
                    Tape
                  </button>
            </div>
        </div>

            <div>
                <div class="row mb-4 d-flex justify-content-center">
                    <div class="input-group col-md-3" style="width: 50%">
                        <input class="form-control py-2 border border-right-0" type="search" value="search" id="example-search-input">
                                <button class="btn btn-outline-secondary border border-left-0" type="button">
                                    <i class="bi bi-search"></i>
                                </button>

                                <div class="d-flex justify-content-center">
                                    <select name="genre_id" class="form-select border-0 text-white bg-color-red1 ">
                                        <option selected>Genre</option>
                                        @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                    </div>
                </div>
                    
                <div class="row ml-5  px-4">
                    @forelse ($posts as $post)    
                    <div class="col-md-2">
                        <div class="Post-card" style="width:200px;">
                                <a href="/post/{{ $post->id }}">
                                    <div class="Post-card-img position-relative">
                                        <label class="genre">{{ $post->genre->name }}</label>
                                        <label class="type position-absolute bottom-0 end-0"> {{ $post->type->name }} </label>
                                        <img src="{{ asset($post->postImages[0]->img_url) }}" style="width:200px; height:200px;" class="me-4" alt="img">
                                    </div>
                                </a>
                                <div class="Post-card-body">
                                    <div class="text-truncate Post-artist">   
                                        {{ $post->artist }}                    
                                    </div>
                                    <div class="text-truncate Post-name">
                                        {{ $post->name }}
                                    </div>
                                    <div class="position-relative p-1">
                                        <div class="price Post-price ">{{ $post->price }}$</div>
                                        <button class="btn wishlist-btn rounded-circle position-absolute bottom-0 end-0" wire:click="addToWishList({{ $post->id }})" style="width:30px; height:30px"><i class="bi-suit-heart-fill"></i> </a>
                                    </div>
                                </div>
                        </div>
                        
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h4 class="mb-4">No Post Available</h4>
                    </div>
                    @endforelse
                </div>
            </div>

    </div>
</div>

@endsection