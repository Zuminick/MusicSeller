<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use App\Models\Genre;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $post->type_id = $validatedData['type_id'];
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
                'img_url' => $finalImagePathName,
            ]);
        }
        return redirect('admin/posts')->with('message', 'Post Added Successfully');
    }

    public function edit(int $post_id)
    {
        $genres = Genre::all();
        $types = Type::all();
        $post = Post::findOrFail($post_id);
        return view('admin.post.edit', compact('genres','types','post'));
    }

    public function update(PostFormRequest $request, $post)
    {
        $validatedData = $request->validated();
        
        $post = Post::findOrfail($post);

        if($post)
        {
            $post->update([
                'user_id' => $validatedData['user_id'],
                'name' => $validatedData['name'],
                'artist' => $validatedData['artist'],
                'type_id' => $validatedData['type_id'],
                'genre_id'  => $validatedData['genre_id'],
                'creation_year' => $validatedData['creation_year'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price']
            ]);

            
            if($request->hasFile('image'))
            {
                $uploadPath = 'uploads/';

                $i = 1;
                foreach($request->file('image') as  $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
                    
                    $post->PostImages()->create([
                        'post_id' => $post->id,
                        'img_url' => $finalImagePathName,
                    ]);
                }
            }
            return redirect('admin/posts')->with('message', 'Post Updated Successfully');
        }
        else
        {
            return redirect('admin/posts')->with('message', 'No Such Post found');
        }
    }

    public function destroyImage(int $post_image_id)
    {
        $postImage = Image::findOrFail($post_image_id);
        if(File::exists($postImage->img_url)){
            File::delete($postImage->img_url);
        }
        $postImage->delete();
        return redirect()->back()->with('message','Image Successfully Deleted');
    }

    public function destroy(int $post_id)
    {
        $post = Post::findOrFail($post_id);
        if($post->PostImages){
            foreach($post->PostImages as $image){
                if(File::exists($image->img_url)){
                    File::delete($image->img_url);
                }
            }
        }
        $post->delete();
        return redirect('admin/posts')->with('message', 'Post Deleted');
    }
}
