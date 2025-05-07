<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getProfile()
    {
        $user = auth()->user();
        return view('student.student_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        //Upload actual file or image
        //store the link.

        // Validate file
        $request->validate([
            'file' => 'file|max:5048', // max 2MB
        ]);

        $userData = $request->all();
        if ($request->student_profile) {
            // Store file in "storage/app/public"
            $path = $request->file('student_profile')->store('uploads', 'public');
            $userData['profile'] = $path;
        }
        auth()->user()->update($userData);

        return redirect()->back()->with('success', 'Your profile updated successfully.');
    }
}
