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

    /**
     * Show the form for creating a new resource.
     */
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
        'feature_icon' => 'nullable|image|mimes:jpg,jpeg,png|max:3000',
    ]);

    $data = [
        'feature_title' => $request->feature_title,
        'feature_description' => $request->feature_description,
    ];

    // যদি Image Upload করা হয়
    if ($request->hasFile('feature_icon')) {

        $image = $request->file('feature_icon');
        $imageName = rand() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);

        $data['feature_icon'] = '/uploads/' . $imageName;
    }

    Feature::create($data);

    return redirect()
        ->route('admin.feature.index')
        ->with('success', 'Created Successfully');
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

    $feature = Feature::findOrFail($id);

    $data = [
        'feature_title' => $request->feature_title,
        'feature_description' => $request->feature_description,
    ];

    if ($request->hasFile('feature_icon')) {

        if ($feature->feature_icon && File::exists(public_path($feature->feature_icon))) {
            File::delete(public_path($feature->feature_icon));
        }

        $image = $request->file('feature_icon');
        $imageName = rand() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);

        $data['feature_icon'] = '/uploads/' . $imageName;
    }

    $feature->update($data);

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

    // return response()->json([
    //     'status' => 'success',
    //     'message' => 'Deleted Successfully',
    // ]);
}

}
