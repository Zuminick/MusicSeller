<div>
 <div class="row">
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
