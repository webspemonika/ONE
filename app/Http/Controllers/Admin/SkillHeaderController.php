<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillHeader;
use Illuminate\Http\Request;

class SkillHeaderController extends Controller
{
    /**
     * Display the form.
     */
    public function index()
    {
        $skillHeader = SkillHeader::firstOrCreate([]);

        return view('admin.skill-header.edit', compact('skillHeader'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkillHeader $skillHeader)
    {
        return view('admin.skill-header.edit', compact('skillHeader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkillHeader $skillHeader)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skillHeader->update($validated);

        return redirect()
            ->route('admin.skill-header.index')
            ->with('success', 'Skill Header updated successfully.');
    }
}
