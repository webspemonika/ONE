<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
public function index()
{
    $socialLink = SocialLink::first();

    if (!$socialLink) {
        $socialLink = new SocialLink();
    }

    return view('admin.social-link.edit', compact('socialLink'));
}

public function store(Request $request)
{
    $request->validate([
    'title' => 'nullable|string|max:255',
    'facebook_url' => 'nullable|url|max:255',
    'whatsapp_url' => 'nullable|url|max:255',
    'linkedin_url' => 'nullable|url|max:255',
    'github_url' =>   'nullable|url|max:255',
    ]);

    SocialLink::create($request->all());

    return redirect()->route('admin.social-link.index')->with('success', 'Social Link Created Successfully');
}

public function edit(SocialLink $socialLink)
{
    return view('admin.social-link.edit', compact('socialLink'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $request->validate([
'title' => 'nullable|string|max:255',
    'facebook_url' => 'nullable|url|max:255',
    'whatsapp_url' => 'nullable|url|max:255',
    'linkedin_url' => 'nullable|url|max:255',
    'github_url' =>   'nullable|url|max:255',
    ]);

    $socialLink = SocialLink::findOrFail($id);

    $socialLink->update($request->only([
        'title',
        'facebook_url',
        'whatsapp_url',
        'linkedin_url',
        'github_url',
    ]));

    return redirect()->back()->with('success', 'Social link updated successfully.');
}


}
