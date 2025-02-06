<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all students data with their user relationships
        $result = Student::with('user')->orderBy('id', 'asc')->paginate(10); // Using pagination

        // Pass the data to the Vue component via Inertia
        return Inertia::render('Students/Index', [
            'result' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Students/Mutate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:1',
            'class' => 'required|string|max:50',
            'address' => 'nullable|string|max:500',
        ]);

        // Create the student record with the authenticated user's ID
        Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'age' => $validated['age'],
            'class' => $validated['class'],
            'address' => $validated['address'],
            'user_id' => auth()->id(), // Get the authenticated user's ID
        ]);

        return redirect()->route('students.index');
    }

    public function show(string $id)
    {
        // Fetch specific student data
        $student = Student::with('user')->findOrFail($id);

        // Pass the data to the Vue component via Inertia
        return Inertia::render('Students/Show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch specific student data
        $student = Student::findOrFail($id);

        // Pass the data to the Vue component via Inertia
        return Inertia::render('Students/Mutate', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the student
        $student = Student::where('id', $id)
            ->firstOrFail();

        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'age' => 'required|integer|min:1',
            'class' => 'required|string|max:50',
            'address' => 'nullable|string|max:500',
        ]);

        // Update the student record
        $student->update($validated);

        return Inertia::render('Students/Show', [
            'student' => $student,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
