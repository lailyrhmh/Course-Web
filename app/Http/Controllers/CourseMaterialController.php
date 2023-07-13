<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class CourseMaterialController extends Controller
{
    // Fungsi untuk menampilkan daftar kursus
    public function index()
    {
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    // Fungsi untuk menampilkan form untuk membuat kursus baru
    public function create()
    {
        return view('courses.create');
    }

    // Fungsi untuk menyimpan kursus baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_duration' => 'required'
        ]);

        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_desc = $request->course_desc;
        $course->course_duration = $request->course_duration;
        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    // Fungsi untuk menampilkan detail kursus
    public function show(Course $course)
    {
        $course = Course::findOrFail($course->id);
        $materials = $course->materials;

        return view('courses.show', compact('course', 'materials'));
    }

    // Fungsi untuk menampilkan form untuk mengedit kursus
    public function edit(Course $course)
    {
        $course = Course::findOrFail($course->id);

        return view('courses.edit', compact('course'));
    }

    // Fungsi untuk menyimpan perubahan pada kursus ke database
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_duration' => 'required'
        ]);

        $course = Course::findOrFail($course->id);

        $course->course_name = $request->course_name;
        $course->course_desc = $request->course_desc;
        $course->course_duration = $request->course_duration;
        $course->save();

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    // Fungsi untuk menghapus kursus dari database
    public function destroy(Course $course)
    {
        $course = Course::findOrFail($course->id);
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }

    // Fungsi untuk menampilkan form untuk menambahkan materi ke dalam kursus
    public function createMaterial(Course $course)
    {
        $course = Course::findOrfail($course->id);
        return view('materials.create', compact('course'));
    }

    // Fungsi untuk menyimpan materi baru ke dalam kursus
    public function storeMaterial(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'material_title' => 'required',
            'material_desc' => 'required',
            'material_link' => 'required'
        ]);

        $material = new Material;
        $material->material_title = $request->material_title;
        $material->material_desc = $request->material_desc;
        $material->material_link = $request->material_link;
        $material->course_id = $course->id;
        $material->save();

        return redirect()->route('courses.show', $course->id)
            ->with('success', 'Material created successfully.');
    }

    // Fungsi untuk menampilkan daftar materi dalam sebuah kursus
    public function showMaterials($id)
    {
        $course = Course::findOrFail($id);
        $materials = $course->materials;
        return view('courses.show', compact('course', 'materials'));
    }

    // Fungsi untuk menampilkan form untuk mengedit materi
    public function editMaterial(Course $course, $id)
    {
        $material = Material::findOrFail($id);
        $course_id = $material->course_id;
        return view('materials.edit', compact('material', 'course_id'));
    }

    // Fungsi untuk menyimpan perubahan pada materi ke database
    public function updateMaterial(Request $request, Course $course, $id)
    {
        $validatedData = $request->validate([
            'material_title' => 'required',
            'material_desc' => 'required',
            'material_link' => 'required'
        ]);

        $material = Material::findOrFail($id);
        $material->material_title = $request->material_title;
        $material->material_desc = $request->material_desc;
        $material->material_link = $request->material_link;
        $material->save();

        return redirect()->route('courses.show', $material->course_id)
            ->with('success', 'Material updated successfully.');
    }

    // Fungsi untuk menghapus materi dari database
    public function destroyMaterial($id)
    {
        $material = Material::findOrFail($id);
        $course_id = $material->course_id;
        $material->delete();

        return redirect()->route('courses.show', $course_id)
            ->with('success', 'Material deleted successfully.');
    }
}
