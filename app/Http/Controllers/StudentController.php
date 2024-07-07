<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function indexAll()
{
    $students = Student::with('school')->get();
    return view('students.index', compact('students'));
}
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('first_name')) {
            $query->where('first_name', 'like', '%' . $request->first_name . '%');
        }

        if ($request->filled('last_name')) {
            $query->where('last_name', 'like', '%' . $request->last_name . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('school_id')) {
            $query->where('school_id', $request->school_id);
        }

        $students = $query->with('school')->get();
        return view('students.index', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        return view('students.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
            'date_of_birth' => 'required|date',
            'enrollment_date' => 'required|date',
            'school_id' => 'required',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $schools = School::all();
        return view('students.edit', compact('student', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'date_of_birth' => 'required|date',
            'enrollment_date' => 'required|date',
            'school_id' => 'required',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
