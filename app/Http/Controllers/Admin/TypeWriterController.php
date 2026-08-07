<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeWriter;
use Illuminate\Http\Request;

class TypeWriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $typewriter = TypeWriter::latest()->get();
          $typewriter = TypeWriter::oldest()->get();
        return view('admin.typewriter.index' , compact('typewriter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.typewriter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'typewriter_text' =>['required' , 'string' , 'max:255']
    ]);


    TypeWriter::create($request->only([
'typewriter_text'
    ]));

    return redirect()
    ->route('admin.type-writer.index')
    ->with('success' , 'Type Writer Text created successfully .');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeWriter $typeWriter)
    {
       return view('admin.typewriter.edit',  compact('typeWriter') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeWriter $typeWriter)
    {
        $request->validate([
            'typewriter_text' =>['required', 'string' ,'max:255']
        ]);

        $typeWriter->update($request->only(
            'typewriter_text'

        ));

        return redirect()
        ->route('admin.type-writer.index')
        ->with('success' , 'Type Writer Updated Successfully .');


    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(TypeWriter $typeWriter)
{
    $typeWriter->delete();

    return redirect()
        ->route('admin.type-writer.index')
        ->with('success', 'Type Writer Deleted Successfully');
}
}
