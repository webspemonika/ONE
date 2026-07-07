<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationHeader;
use Illuminate\Http\Request;

class EducationHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
 public function edit()
    {
        $educationHeader = EducationHeader::first();

        return view('admin.education.header.edit', compact('educationHeader'));
    }

    /**
     * Update the specified resource in storage.
     */
     /**
     * Update the education header.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' =>   ['required', 'string', 'max:255'],
            'heading' => ['required', 'string' , 'max:255'],
            'description' => ['required', 'string','max:255'],
        ]);

        $educationHeader = EducationHeader::first();

        // যদি row($educationHeader) না থাকে, তাহলে তৈরি করবে
        if (!$educationHeader) {
            $educationHeader = new EducationHeader();
        }

        $educationHeader->title = $request->title;
        $educationHeader->heading = $request->heading;
        $educationHeader->description = $request->description;

        $educationHeader->save();

        return redirect()->back()->with('success', 'Education Header updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
