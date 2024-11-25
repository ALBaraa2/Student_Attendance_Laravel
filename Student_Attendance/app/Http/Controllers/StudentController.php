<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('user')->get();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|integer|unique:users,id_number',
            'phone_number' => 'required|string|max:13',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'gender' => 'required|in:male,female',
        ]);
//        // Create the user
        $user = User::query()->create([
            'id_number' => $validated['id_number'],
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Set a default or handle password properly
        ]);
        $user_id = $user->getAttribute('id');
        $gender_num = $validated['gender'] == 'male'?'1':'2';
        $gender = $validated['gender'];
        $year = date('Y');
        $student_num = Student::query()->where('students.year_of_enrollment', '=', "$year")
            ->where('students.gender', '=', "$gender")->count() + 1;

        $end_num = "$student_num";
        if ($student_num < 10)
            $end_num = '000' . "$student_num";
        elseif ($student_num < 100)
            $end_num = '00' . "$student_num";
        elseif ($student_num < 1000)
            $end_num = '0' . "$student_num";
        $student_id = $gender_num . $year . $end_num;
        // Create the student
        Student::query()->create([
            'id' => $user_id,
            'name' => $validated['name'],
            'gender' => $validated['gender'],
            'student_id' => $student_id,
            'year_of_enrollment' => $year
        ]);

        // Redirect back to the students index with success message
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
