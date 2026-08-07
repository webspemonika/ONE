<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DesignSkill;
use Illuminate\Http\Request;

class DesignSkillController extends Controller
{
    public function index()
    {
        $designSkills = DesignSkill::latest()->get();

        return view('admin.design-skill.index', compact('designSkills'));
    }

    public function create()
    {
        return view('admin.design-skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tech_name' => ['required', 'string', 'max:255'],
            'tech_percent' => ['required', 'numeric', 'between:0,100'],
        ]);

        DesignSkill::create($request->only(
            'tech_name',
            'tech_percent'
            ));

        return redirect()
            ->route('admin.design-skill.index')
            ->with('success', 'DesignSkill Created Successfully');
    }

 

    public function edit(DesignSkill $designSkill)
    {
        return view('admin.design-skill.edit', compact('designSkill'));
    }

    public function update(Request $request, DesignSkill $designSkill)
    {
        $request->validate([
            'tech_name' => ['required', 'string', 'max:255'],
            'tech_percent' => ['required', 'numeric', 'between:0,100'],
        ]);

        $designSkill->update($request->only(
            'tech_name',
            'tech_percent'
            ));

        return redirect()
            ->route('admin.design-skill.index')
            ->with('success', 'DesignSkill Updated Successfully');
    }

public function destroy(string $id)
{
    $designSkill = DesignSkill::findOrFail($id);
    $designSkill->delete();

    // return response()->json([
    //     'status' => 'success',
    //     'message' => 'Deleted Successfully'
    // ]);
    // ajax request a form submit korla ................
     return redirect()
        ->route('admin.design-skill.index')
        ->with('success', 'Design Skill Deleted Successfully');
}
}
