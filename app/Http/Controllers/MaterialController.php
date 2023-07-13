<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::latest()->paginate(5);
        return view('materials.index',compact('materials'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'material_title' => 'required',
            'material_desc' => 'required',
            'material_link' => 'required'
        ]);

        Material::create($request->all());

        return redirect()->route('materials.index')->with('success','Material created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view('materials.show',compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $material = Material::findOrfail($material->id);
        
        return view('materials.edit',compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'material_title' => 'required',
            'material_desc' => 'required',
            'material_link' => 'required'
        ]);

        $material = Material::findOrfail($material->id);

        // $material->update($request->all());

        $material->material_title = $request->material_title;
        $material->material_desc = $request->material_desc;
        $material->material_link = $request->material_link;
        $material->save();

        return redirect()->route('courses.show', $material->course->id)->with('success','Material updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material = Material::findOrfail($material->id);

        $course_id = $material->course->id;

        $material->delete();

        return redirect()->route('courses.show', $course_id)->with('success','Material deleted successfully');
    }
}
