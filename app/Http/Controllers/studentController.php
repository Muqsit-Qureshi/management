<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassTeacher;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('classTeacher')->get();
        $classTeachers = ClassTeacher::all();
        return view('student.index', compact('students', 'classTeachers'));
    }


    public function create()
    {
        $classTeachers = ClassTeacher::all();
        return view('student.create', compact('classTeachers'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:class_teachers,id',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    public function edit(Student $student)
    {
        $classTeachers = ClassTeacher::all();
        return view('student.edit', compact('student', 'classTeachers'));
    }


    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:class_teachers,id',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

        public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
