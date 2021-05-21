<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Grade;
use App\Models\Kind;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/student
    public function index()
    {
        // if (auth()->guard('admin')->check()) {
        //     $students = Student::cursorPaginate(3);

        //     return view('Admin.Student.index', compact('students'));
        // }

        // $kinds = Kind::all();
        // $pathImage = '/images/home/';
        $students = Student::all();
        return view('auth.admin.student.index', compact('students'));
    }

    // [VIEW/GET] localhost:8000/admin/student/register
    public function register()
    {
        $grades = Grade::all();
        $majors = Major::all();
        return view('auth.admin.student.register', compact('grades', 'majors'));
    }

    // [VIEW/GET] localhost:8000/admin/student/:id
    public function detail()
    {
        return view('auth.admin.student.detail');
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
        return view('auth.admin.student.edit', compact('student', 'grades', 'majors'));
    }

    public function store(StoreStudentRequest $request, Student $student)
    {
        $attr = $request->all();
        Student::create($attr);
        return redirect()->route('student')
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
            ->with('success', 'Student Berhasil Dihapus');
    }
    public function handleSearch()
    {
        $form = request();
        if (isset($form->search)) {
            $students = Student::where('name', 'like', '%' . $form->search . '%')
                ->orWhere('nis', 'like', '%' . $form->search . '%')
                ->orWhere('start_year', 'like', '%' . $form->search . '%')
                ->orWhere('start_year', 'like', '%' . $form->search . '%')
                ->get();
        } else {
            $students = Student::all();
        }
        return view('auth.admin.student.index', compact('students'));
    }
}
