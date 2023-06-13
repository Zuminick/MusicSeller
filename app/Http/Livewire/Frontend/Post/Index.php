<?php

namespace App\Http\Livewire\Frontend\Post;

use App\Models\Post;
use Livewire\Component;
use App\Models\Wishlist;

class Index extends Component
{
    public $posts, $genreInputs = [];
    // public $wishlist;
    // protected $queryString = ['genreInputs'];

    public function mount($posts)
    {
        $this->posts = $posts;
        // if(auth()->user()->id)
        //     $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
    }
    public function render()
    {
        // $this->posts = Post::where('genre_id', $this->genre->id)
        //                     ->when($this->genreInputs, function($q){
        //                         $q->whereIn('genre_id', $this->genreInputs);
        //                     })
        //                     ->where('status', '0')
        //                     ->get();

        $this->posts = Post::all();
        return view('livewire.frontend.post.index',[
            'posts' => $this->posts
            // 'wishlist' => $this->wishlist
        ]);
    }
    
    public function addToWishList(int $post_id)
    {
        if (Wishlist::where('user_id', auth()->user()->id)->where('post_id', $post_id)->doesntExist()) {
            $wishlist = new Wishlist;
            $wishlist->user_id = auth()->user()->id;
            $wishlist->post_id = $post_id;
            $wishlist->save();
            $this->dispatchBrowserEvent('message',[
                'text' => 'Post added to your Wishlist',
                'type' => 'success',
                'status' => 200
            ]);
        }
    }
}
