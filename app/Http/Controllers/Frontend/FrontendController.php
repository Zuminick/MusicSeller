<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $genres = Genre::all();
        return view('frontend.index',compact('posts', 'genres'));
    }

    public function addToWishList($post_id)
    {
        dd($post_id);
    }
}
