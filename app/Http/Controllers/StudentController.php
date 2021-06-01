<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\{Grade, Major, Student, Transaction}; // simplify
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\simplePaginate;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::simplePaginate(20);
        return view('auth.admin.student.index', compact('students'));
    }

    public function register()
    {
        $grades = Grade::all();
        $majors = Major::all();
        return view('auth.admin.student.register', compact('grades', 'majors'));
    }

    public function detail($nis)
    {
        $student = Student::where('nis', $nis)->get();
        if ($student->iseEmpty()) {
            abort(404);
        }
        $student = $student[0];
        return view('auth.admin.student.detail', compact('student'));
    }

    public function edit($nis)
    {
        $get_student_id = Student::where('nis', $nis)->get();
        if ($get_student_id->isEmpty()) {
            abort(404);
        }

        $grades = Grade::all();
        $majors = Major::all();
        $student = Student::where('nis', $nis)->get();
        $student = $student[0];
        return view('auth.admin.student.edit', compact('student', 'grades', 'majors'));
    }

    public function store(StoreStudentRequest $request, Student $student)
    {
        $attr = $request->all();
        $attr['password'] = Hash::make($attr['password']);
        $attr['start_year'] = date('Y-m-d');
        $attr['graduated'] = 0;
        Student::create($attr);
        return redirect()->route('student')
            ->with('success', 'Student Berhasil Ditambahkan');
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {

        $attr = $request->all();
        if (!$request->password && !$request->password_confirmation) {
            // sama sama gak diset
            unset($attr['password']);
            unset($attr['confirmation_password']);
        } else if ($request->password && $request->password_confirmation && $request->password === $request->password_confirmation) {
            // ada password dan konfirmasi dan nilainya sama
            $attr['password'] = Hash::make($attr['password']);
        }
        // dd($attr);
        $student->update($attr);
        return redirect()->route('student')
            ->with('success', 'Student Berhasil Diubah');
    }

    public function delete(Student $student)
    {
        $transactions = Transaction::where([['student_nis', '=',$student->nis], ['status','<>', 'done']]);
        if ($transactions->count() > 0) {
            return redirect()->route('student')->with('error', 'Student masih mempunyai transaksi');
        }
        $transactions = Transaction::where('student_nis','=',$student->nis)->get();
        foreach($transactions as $transaction) {
            $transaction->delete();
        }
        $student->delete();

        return redirect()->route('student')
            ->with('success', 'Student Berhasil Dihapus');
    }

    public function handleSearch()
    {
        $form = request();
        if ($form->search) {
            $students = Student::where('name', 'like', '%' . $form->search . '%')->simplePaginate(20);
        } else {
            $students = Student::simplePaginate(20);
        }
        return view('auth.admin.student.index', compact('students'));
    }
}
