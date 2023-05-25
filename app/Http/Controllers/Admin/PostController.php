<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use App\Models\Genre;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $genres = Genre::all();
        $types = Type::all();
        return view('admin.post.create', compact('genres','types'));
    }

    public function store(PostFormRequest $request)
    {
        $validatedData = $request->validated();

        $post = new Post;
        $post->user_id = $validatedData['user_id'];
        $post->name = $validatedData['name'];
        $post->artist = $validatedData['artist'];
        $post->type = $validatedData['type_id'];
        $post->genre_id = $validatedData['genre_id'];
        $post->creation_year = $validatedData['creation_year'];
        $post->description = $validatedData['description'];
        $post->price = $validatedData['price'];
        $post->save();
        

        $uploadPath = 'uploads/';

        $i = 1;
        foreach($request->file('image') as  $imageFile){
            $extention = $imageFile->getClientOriginalExtension();
            $filename = time().$i++.'.'.$extention;
            $imageFile->move($uploadPath,$filename);
            $finalImagePathName = $uploadPath.$filename;
            

            $post->PostImages()->create([
                'post_id' => $post->id,
                'img_url' => $finalImagePathName
            ]);
            // $image = new Image;
            // $image->img_url = $finalImagePathName;
            // $image->save();
            // $post->images()->attach($image->id);
        }
        return redirect('admin/posts')->with('message', 'Post Added Successfully');
    }

    // public function edit(post $post)
    // {
    //     return view('admin.post.edit', compact('post'));
    // }

    // public function update(postFormRequest $request, $post)
    // {
    //     $validatedData = $request->validated();
        
    //     $post = post::findOrFail($post);

    //     $post->name = $validatedData['name'];
    //     $post->update();
    //     return redirect('admin/post')->with('message', 'post Updated Successfully');
    // }
}
