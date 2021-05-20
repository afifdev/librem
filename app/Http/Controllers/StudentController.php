<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Grade;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/student
    public function index()
    {
        $students = Student::all();
        return view('Admin.Student.index', compact('students'));
    }

    // [VIEW/GET] localhost:8000/admin/student/register
    public function register()
    {
        $grades = Grade::all();
        $majors = Major::all();
        return view('Admin.Student.register', compact('grades', 'majors'));
    }

    // [VIEW/GET] localhost:8000/admin/student/:id
    public function detail()
    {
        return view('Admin.Student.detail');
    }

    // [VIEW/GET] localhost:8000/admin/student/:id/edit
    public function edit($id)
    {
        // Check if url false
        $get_student_id = Student::where('id', $id)->get();
        if ($get_student_id->isEmpty()) {
            abort(404);
        }

        $grades = Grade::all();
        $majors = Major::all();
        $student = Student::where('id', $id)->get();
        $student = $student[0];
        return view('Admin.Student.edit', compact('student', 'grades', 'majors'));
    }

    public function store(StoreStudentRequest $request, Student $student)
    {
        $attr = $request->all();
        Student::create($attr);
        return redirect()->route('studentRegister')
            ->with('success', 'Student Berhasil Ditambahkan');
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $attr = $request->all();
        $student->update($attr);

        return redirect()->route('student')
            ->with('success', 'Student Berhasil Diubah');
    }

    public function delete(Student $student)
    {
        $student->delete();

        return redirect()->route('student')
            ->with('success', 'Student Berhasil Dihapuss');
    }
}
