<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeFormRequest;

class TypeController extends Controller
{
    public function index()
    {
        return view('admin.type.index');
    }

    public function create()
    {
        return view('admin.type.create');
    }

    public function store(TypeFormRequest $request)
    {
        $validatedData = $request->validated();

        $type = new Type;
        $type->name = $validatedData['name'];
        $type->save();
        return redirect('admin/types')->with('message', 'Type Added Successfully');
    }

    public function edit(Type $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    public function update(typeFormRequest $request, $type)
    {
        $validatedData = $request->validated();
        
        $type = type::findOrFail($type);

        $type->name = $validatedData['name'];
        $type->update();
        return redirect('admin/types')->with('message', 'type Updated Successfully');
    }
}
