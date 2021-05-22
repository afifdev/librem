<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\simplePaginate;


class TeacherController extends Controller
{
    // [VIEW/GET] localhost:8000/admin/teacher
    public function index()
    {
        $teachers = Teacher::simplePaginate(10);
        return view('auth.admin.teacher.index', compact('teachers'));
    }

    // [VIEW/GET] localhost:8000/admin/teacher/register
    public function register()
    {
        return view('auth.admin.teacher.register');
    }

    // [VIEW/GET] localhost:8000/admin/teacher/:id
    public function detail()
    {
        return view('auth.admin.teacher.detail');
    }

    // [VIEW/GET] localhost:8000/admin/teacher/:id/edit
    public function edit($nip)
    {
        // Check if url false
        $get_teacher_id = Teacher::where('nip', $nip)->get();
        if ($get_teacher_id->isEmpty()) {
            abort(404);
        }

        $teacher = Teacher::where('nip', $nip)->get();
        $teacher = $teacher[0];
        return view('auth.admin.teacher.edit', compact('teacher'));
    }

    public function store(StoreTeacherRequest $request, Teacher $teacher)
    {
        $attr = $request->all();
        $attr['password'] = Hash::make($attr['password']);
        Teacher::create($attr);
        return redirect()->route('teacher_register')
            ->with('success', 'Teacher Berhasil Ditambahkan');
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        if (!Hash::check($request->currentpwd, $teacher->password)) {
            dd($request->currentpwd);
        }
        $attr = $request->all();
        if (!$request->password && !$request->password_confirmation) {
            // sama sama gak diset
            unset($attr['password']);
            unset($attr['confirmation_password']);
        } else if ($request->password && $request->password_confirmation && $request->password === $request->password_confirmation) {
            // ada password dan konfirmasi dan nilainya sama
            $attr['password'] = Hash::make($attr['password']);
        }
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
    public function handleSearch()
    {
        $form = request();
        if ($form->search) {
            $teachers = Teacher::where('name', 'like', '%' . $form->search . '%')->simplePaginate(10);
        } else {
            $teachers = Teacher::simplePaginate(10);
        }
        return view('auth.admin.teacher.index', compact('teachers'));
    }
}
