<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $post_id)
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('post_id', $post_id)->delete();
        $this->dispatchBrowserEvent('message',[
            'text' => 'Post Removed from Wishlist',
            'type' => 'success',
            'status' => 200
        ]);
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
}
