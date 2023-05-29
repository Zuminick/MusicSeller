<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('frontend.index',compact('posts'));
    }

    public function addToWishList($post_id)
    {
        dd($post_id);
    }
}
