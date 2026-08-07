<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FeatureDataTable;
use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(FeatureDataTable $dataTable)
{
    return $dataTable->render('admin.feature.index');
}

public function create()
{
    return view('admin.feature.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'feature_title' => 'required|max:200',
        'feature_description' => 'required|max:500',
        'feature_icon' => 'required|image|mimes:jpg,jpeg,png|max:3000',
    ]);

    // Model Object তৈরি
    $feature = new Feature();

    // Value Assign
    $feature->feature_title = $request->feature_title;
    $feature->feature_description = $request->feature_description;



// Image Upload
if ($request->hasFile('feature_icon')) {

    // পুরোনো Image Delete
    if ($feature->feature_icon && File::exists(public_path($feature->feature_icon))) {
        File::delete(public_path($feature->feature_icon));
    }

    // নতুন Image Upload
    $image = $request->file('feature_icon');
    $imageName = rand() . '_' . $image->getClientOriginalName();

    $image->move(public_path('uploads/feature'), $imageName);

    $feature->feature_icon = 'uploads/feature/' . $imageName;
}

    // Database-এ Save
    $feature->save();

    return redirect()
        ->route('admin.feature.index')
        ->with('success', 'Created Successfully');
}



    /**
     * Show the form for editing the specified resource.
     */
public function edit(string $id)
{
    $feature = Feature::findOrFail($id);

    return view('admin.feature.edit', compact('feature'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $request->validate([
        'feature_title' => 'required|max:200',
        'feature_description' => 'required|max:500',
        'feature_icon' => 'nullable|image|mimes:jpg,jpeg,png|max:3000',
    ]);

    // Model Find
    $feature = Feature::findOrFail($id);

    // Value Assign
    $feature->feature_title = $request->feature_title;
    $feature->feature_description = $request->feature_description;

    // Image Upload
    if ($request->hasFile('feature_icon')) {

        if ($feature->feature_icon && File::exists(public_path($feature->feature_icon))) {
            File::delete(public_path($feature->feature_icon));
        }

        $image = $request->file('feature_icon');
        $imageName = rand() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);

        $feature->feature_icon = '/uploads/' . $imageName;
    }

    // Database Update
    $feature->save();

    return redirect()
        ->route('admin.feature.index')
        ->with('success', 'Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $feature = Feature::findOrFail($id);

    // যদি Image থাকে তাহলে Delete করুন
    if ($feature->feature_icon && File::exists(public_path($feature->feature_icon))) {
        File::delete(public_path($feature->feature_icon));
    }

    // Database থেকে Delete
    $feature->delete();
  return response()->json([
        'status' => 'success',
        'message' => 'Deleted Successfully'
    ]);

}

}
