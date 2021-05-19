<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/teacher
    public function index()
    {
        $teachers = Teacher::all();
        return view('Admin.Teacher.index', compact('teachers'));
    }

    // [VIEW/GET] localhost:8000/admin/teacher/register
    public function register()
    {

        return view('Admin.Teacher.register');
    }

    // [VIEW/GET] localhost:8000/admin/teacher/:id
    public function detail()
    {
        return view('Admin.Teacher.detail');
    }

    // [VIEW/GET] localhost:8000/admin/teacher/:id/edit
    public function edit($id)
    {
        // Check if url false
        $get_teacher_id = Teacher::where('id', $id)->get();
        if ($get_teacher_id->isEmpty()) {
            abort(404);
        }

        $teacher = Teacher::where('id', $id)->get();
        $teacher = $teacher[0];
        return view('Admin.Teacher.edit', compact('teacher'));
    }

    public function store(StoreTeacherRequest $request, Teacher $teacher)
    {
        $attr = $request->all();
        Teacher::create($attr);
        return redirect()->route('teacherRegister')
            ->with('success', 'Teacher Berhasil Ditambahkan');
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $attr = $request->all();
        $teacher->update($attr);

        return redirect()->route('teacher')
            ->with('success', 'Teacher Berhasil Diubah');
    }

    public function delete(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher')
            ->with('success', 'Teacher Berhasil Dihapuss');
    }
}
