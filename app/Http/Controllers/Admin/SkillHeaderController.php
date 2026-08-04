<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillHeader;
use Illuminate\Http\Request;

class SkillHeaderController extends Controller
{

    public function index()
    {
        $skillHeader = SkillHeader::firstOrCreate([]);

        return view('admin.skill-header.edit', compact('skillHeader'));
    }



    public function edit(SkillHeader $skillHeader)
    {
        return view('admin.skill-header.edit', compact('skillHeader'));
    }


    public function update(Request $request, SkillHeader $skillHeader)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skillHeader->update($validated);

        return redirect()->route('admin.skill-header.index')->with('success', 'Skill Header updated successfully.');
    }
}
