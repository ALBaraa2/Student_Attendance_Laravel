<?php

namespace App\Http\Controllers;

use App\Models\TeachAssistant;
use App\Models\User;
use Illuminate\Http\Request;

class TeachAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assistants = TeachAssistant::with('user')->get();
        return view('teachAssistants.index',compact('assistants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachAssistants.create');
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
        ]);

        $user = User::query()->create([
            'id_number' => $validated['id_number'],
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'email' => $validated['email'],
            'password'=> bcrypt($validated['password']),
        ]);

        $year = date('Y');
        $assistants_num = TeachAssistant::query()->where('year_of_enrollment', '=', "$year")->count();
        $assistant_id = "$year" . "$assistants_num";

        $assistant = TeachAssistant::query()->create([
            'id' => $user['id'],
            'name' => $validated['name'],
            'teach_assistant_id' => $assistant_id,
            'year_of_enrollment' => "$year"
        ]);

        return redirect()->route('assistants.index')->with('success','Teach assistant added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeachAssistant $teachAssistant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachAssistant $teachAssistant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeachAssistant $teachAssistant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachAssistant $teachAssistant)
    {
        //
    }
}
