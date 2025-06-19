<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Slider::all();
        return view('slider.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'name' => ['required', 'string', 'max:200', 'unique:sliders'],
            'link' => ['nullable'],
            'document_path' => ['nullable'],
            'status' => ['integer', 'required'],
        ]);

        // dd($validateData);
        if ($request->document_path) {
            // Store file in "storage/app/public"
            $path = $request->file('document_path')->store('uploads', 'public');
            $validateData['document_path'] = $path;
        }

        // dd($validateData);
        Slider::create($validateData);
        return redirect()->route('sliders.index')->with('status', 'Slider data stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
