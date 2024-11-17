<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
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
        $validation = $request->validate([
            'course_id' => 'required | string',
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        Course::created($validation);

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $course = Course::findOrFail($id);

        return view('courses.show',compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $course = Course::findOrFail($id);

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validation = $request->validate([
            'course_id' => 'required | string',
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $course = Course::findOrFail($id);

        $course->update($validation);

        return redirect()->route('courses.index')->with('success','Course Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}