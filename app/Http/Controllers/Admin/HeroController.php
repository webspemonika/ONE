<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HeroDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\File;
class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HeroDataTable $dataTable)
    {
         return $dataTable->render('admin.hero.index');
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
    $request->validate([
        'greeting_text' => 'required',
        'title' => 'required',
        'description' => 'required',
        'hero_img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'profile_dark_img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'profile_light_img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $hero = new Hero();

    $hero->greeting_text = $request->greeting_text;
    $hero->title = $request->title;
    $hero->description = $request->description;

    // Hero Image
    if ($request->hasFile('hero_img')) {
        $file = $request->file('hero_img');
        $name = time().'_hero.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/hero'), $name);
        $hero->hero_img = 'uploads/hero/'.$name;
    }

    // Dark Image
    if ($request->hasFile('profile_dark_img')) {
        $file = $request->file('profile_dark_img');
        $name = time().'_dark.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/hero'), $name);
        $hero->profile_dark_img = 'uploads/hero/'.$name;
    }

    // Light Image
    if ($request->hasFile('profile_light_img')) {
        $file = $request->file('profile_light_img');
        $name = time().'_light.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/hero'), $name);
        $hero->profile_light_img = 'uploads/hero/'.$name;
    }

    $hero->save();

   return redirect()->route('admin.hero.edit')
    ->with('success', 'Hero updated successfully.');
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
    $hero = Hero::first();

    if (!$hero) {
        $hero = new Hero(); // empty object
    }

    return view('admin.hero.edit', compact('hero'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request)
{
    $hero = Hero::first();

    if (!$hero) {
        $hero = new Hero();
    }

    $request->validate([
        'greeting_text' => 'required',
        'title' => 'required',
        'description' => 'required',
        'hero_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'profile_dark_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'profile_light_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $hero->greeting_text = $request->greeting_text;
    $hero->title = $request->title;
    $hero->description = $request->description;

    // Hero Image
    if ($request->hasFile('hero_img')) {
        if ($hero->hero_img && File::exists(public_path($hero->hero_img))) {
            File::delete(public_path($hero->hero_img));
        }

        $file = $request->file('hero_img');
        $name = time().'_hero.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/hero'), $name);
        $hero->hero_img = 'uploads/hero/'.$name;
    }

    // Dark Image
    if ($request->hasFile('profile_dark_img')) {
        if ($hero->profile_dark_img && File::exists(public_path($hero->profile_dark_img))) {
            File::delete(public_path($hero->profile_dark_img));
        }

        $file = $request->file('profile_dark_img');
        $name = time().'_dark.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/hero'), $name);
        $hero->profile_dark_img = 'uploads/hero/'.$name;
    }

    // Light Image
    if ($request->hasFile('profile_light_img')) {
        if ($hero->profile_light_img && File::exists(public_path($hero->profile_light_img))) {
            File::delete(public_path($hero->profile_light_img));
        }

        $file = $request->file('profile_light_img');
        $name = time().'_light.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/hero'), $name);
        $hero->profile_light_img = 'uploads/hero/'.$name;
    }

    $hero->save();

    return redirect()->route('admin.hero.edit')
        ->with('success', 'Hero updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
