<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Carbon\Traits\Date;
use DateTimeZone;
use Illuminate\Http\Request;

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

        $course_id = $request->input('course_id');
        $currentYear = date('Y');
        $nextYear = date('Y') + 1;
        $year = "$currentYear-$nextYear"; //this year + this year+1 like   2025-2026
        $currentMonth = date('M');
        if ($currentMonth >= 1 && $currentMonth <= 5) {
            $semester = 'Spring'; // January to May
        } elseif ($currentMonth >= 6 && $currentMonth <= 8) {
            $semester = 'Summer'; // June to August
        } else {
            $semester = 'Fall'; // September to December
        }
        $data = [
            'course_id' =>  $course_id,
            'year' => $year,
            'semester' => $semester
        ];

        $isCourseExistsInSection = Section::where('course_id', $course_id)
            ->where('year', $year)
            ->where('semester', $semester)
            ->exists();
        if (!$isCourseExistsInSection) {
            Section::query()->create($data);
            $success = 'Section add successfully';
        } else
            $success = 'This course is in this section';

        return redirect()->route('courses.index')->with('success',"$success");
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
