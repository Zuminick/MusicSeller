<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreFormRequest;

class GenreController extends Controller
{
    public function index()
    {
        return view('admin.genre.index');
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    public function store(GenreFormRequest $request)
    {
        $validatedData = $request->validated();

        $genre = new Genre;
        $genre->name = $validatedData['name'];
        $genre->save();
        return redirect('admin/genres')->with('message', 'Genre Added Successfully');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    public function update(GenreFormRequest $request, $genre)
    {
        $validatedData = $request->validated();
        
        $genre = Genre::findOrFail($genre);

        $genre->name = $validatedData['name'];
        $genre->update();
        return redirect('admin/genres')->with('message', 'Genre Updated Successfully');
    }
}
