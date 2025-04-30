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
}
