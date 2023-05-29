<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

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

                        @forelse ($wishlist as $wish)
                            
                        <div class="cart-item border">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ asset($wish->post->postImages[0]->img_url) }}" style="width:60px; height:60px;" class="me-4 border" alt="img">
                                </div>
                                <div class="col-md-3 my-auto">
                                    <label class="artist">{{ $wish->post->artist }}</label>
                                </div>
                                <div class="col-md-4 my-auto">
                                    <a href="{{ url('post/'.$wish->post->id) }}">
                                        <label class="name">{{ $wish->post->name }}</label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{ $wish->post->price }}$</label>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishlistItem({{ $wish->post_id }})" class="btn btn-danger">
                                            <span wire:target="removeWishlistItem({{ $wish->post_id }})">
                                                <i class="bi bi-x"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td>
                                <td colspan="4">Your Wishlist is empty</td>
                            </td>
                        </tr>  
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
