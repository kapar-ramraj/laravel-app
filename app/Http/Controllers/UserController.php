<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserForm()
    {
        $users = User::all(); // User::get();
        return view('user.create', compact('users'));
    }

    public function storeUser(Request $request)
    {
        User::create($request->all());

        return redirect()->back()->with('status', 'User data stored successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('status', 'User deleted successfully.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        // dd($request->all(),$id);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('user/create')->with('status', 'User deleted successfully.');
    }
}
