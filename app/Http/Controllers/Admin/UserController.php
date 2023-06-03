<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserFormRequest $request, $user)
    {
        $validatedData = $request->validated();
        
        $user = User::findOrFail($user);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role_as = $validatedData['role_as'];
        $user->update();
        return redirect('admin/users')->with('message', 'User Updated Successfully');
    }

    public function destroy(int $user_id)
    {
        $user = user::findOrFail($user_id);
        $user->delete();
        return redirect('admin/users')->with('message', 'User Deleted');
    }
}
