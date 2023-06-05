<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistFormRequest;
use App\Models\User;

class WishlistController extends Controller
{
    public function index(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $wishlist = Wishlist::where('user_id', $user_id)->get();
        return view('admin.wishlist.index', compact('user'), compact('wishlist'));
    }

    public function create()
    {
        return view('admin.wishlist.create');
    }

    public function store(WishlistFormRequest $request)
    {
        $validatedData = $request->validated();

        $wishlist = new wishlist;
        $wishlist->user_id = $validatedData['user_id'];
        $wishlist->post_id = $validatedData['post_id'];
        $wishlist->save();
        return redirect('admin/wishlists')->with('message', 'String from Wishlist Added Successfully');
    }

    public function edit(wishlist $wishlist)
    {
        return view('admin.wishlist.edit', compact('wishlist'));
    }

    public function update(WishlistFormRequest $request, $wishlist)
    {
        $validatedData = $request->validated();
        
        $wishlist = Wishlist::findOrFail($wishlist);

        $wishlist->user_id = $validatedData['user_id'];
        $wishlist->post_id = $validatedData['post_id'];
        $wishlist->update();
        return redirect('admin/wishlists')->with('message', 'String from Wishlist Updated Successfully');
    }

    public function destroy(int $user_id, int $post_id)
    {
        // dd($post_id, $user_id);
        $wishlist = Wishlist::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        return redirect('admin/'.$user_id.'/wishlist')->with('message', 'Post Deleted from Wishlist');
    }
}
