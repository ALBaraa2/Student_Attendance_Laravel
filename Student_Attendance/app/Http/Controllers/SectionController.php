<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with(['course'])->get();

        return view('sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('sections.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'course_id' =>  $request->input('course_id'),
            'year' => '2024',
            'semester' => 'Fall'
        ];
        Section::query()->create($data);

        return redirect()->route('courses.index')->with('success','Section add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $section = Section::findOrFail($id);
        return view('sections.show',compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $section = Section::query()->findOrFail($id);
        $courses = Course::all();

        return view('sections.edit', compact(['section','courses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validation = $request->validate([
            'course_id' => 'required|string',
            'year' => 'required|int|min:2000|max:2024',
            'semester' => 'required|string|[winter,summer,fall]'
        ]);

        $section = Section::findOrFail($id);
        $section->update($validation);

        return redirect()->route('sections.index')->with('success','Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('sections.index')->with('success','Section deleted successfully');
    }
}
