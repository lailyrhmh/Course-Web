<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_duration' => 'required'
        ]);

        // Course::create($request->all());
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_desc = $request->course_desc;
        $course->course_duration = $request->course_duration;
        $course->save();

        return redirect()->route('courses.index')->with('success','Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course = Course::findOrfail($course->id);
        $materials = $course->materials;

        return view('courses.show',compact('course', 'materials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course = Course::findOrfail($course->id);

        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_duration' => 'required'
        ]);

        // $course->update($request->all());
        $course = Course::findOrfail($course->id);

        $course->course_name = $request->course_name;
        $course->course_desc = $request->course_desc;
        $course->course_duration = $request->course_duration;
        $course->save();

        return redirect()->route('courses.index')->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course = Course::findOrfail($course->id);

        $course->delete();

        return redirect()->route('courses.index')->with('success','Course deleted successfully');
    }

    public function addMaterial(Course $course)
    {
        $course = Course::findOrfail($course->id);

        return view('materials.create',compact('course'));
    }

    public function storeMaterial(Request $request, Course $course)
    {
        $request->validate([
            'material_title' => 'required',
            'material_desc' => 'required',
            'material_link' => 'required'
        ]);

        $course = Course::findOrfail($course->id);

        // $course->materials()->create([
        //     'material_name' => $request->material_name,
        //     'material_desc' => $request->material_desc,
        //     'material_duration' => $request->material_duration
        // ]);

        $material = new Material;
        $material->material_name = $request->material_title;
        $material->material_desc = $request->material_desc;
        $material->material_link = $request->material_link;
        $course->materials()->save($material);

        return redirect()->route('courses.show', $course->id)->with('success','Material added successfully');
    }
}
