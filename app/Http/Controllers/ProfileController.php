<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Teacher, Student};
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        if (auth()->guard('student')->check()) {
            $nis = auth()->guard('student')->user()->nis;
            // $user = DB::table('students')->whereRaw('cast(students.nis AS BIGINT)='.$nis) For Heroku
            $user = DB::table('students')->where('student_nis','=',$nis)
                // ->join('transactions', 'transactions.student_nis', '=', DB::raw('cast(students.nis AS BIGINT)')) For Heroku
                ->join('transactions', 'transactions.student_nis', '=', 'students.nis')
                ->join('details', 'details.transaction_id', '=', 'transactions.id')
                ->join('admins', 'admins.id','=','transactions.admin_id')
                ->join('books', 'books.code', '=', 'transactions.book_code')
                ->select('students.name as user_name', 'students.nis as user_number', 'books.title as title', 'transactions.status as status', 'admins.name as admin_name', 'details.take_date as take_date', 'details.due_date as due_date', 'details.return_date as return_date', 'details.penalty as penalty', 'details.debt_collected as debt_collected')
                ->get();
            return view('auth.profile', compact('user'));
        } else if (auth()->guard('teacher')->check()) {
            $nip = auth()->guard('teacher')->user()->nip;
            // $user = DB::table('teachers')->whereRaw('cast(teachers.nip AS TEXT)='.$nip) For Heroku
            $user = DB::table('teachers')->where('teacher_nip','=', $nip)
                // ->join('transactions', 'transactions.teacher_nip', '=', DB::raw('cast(teachers.nip AS BIGINT)')) For Heroku
                ->join('transactions', 'transactions.teacher_nip', '=', 'teachers.nip')
                ->join('admins', 'admins.id','=','transactions.admin_id')
                ->join('details', 'details.transaction_id', '=', 'transactions.id')
                ->join('books', 'books.code', '=', 'transactions.book_code')
                ->select('teachers.name as user_name', 'teachers.nip as user_number', 'books.title as title', 'transactions.status as status', 'admins.name as admin_name', 'details.take_date as take_date', 'details.due_date as due_date', 'details.return_date as return_date', 'details.penalty as penalty', 'details.debt_collected as debt_collected')
                ->get();
            return view('auth.profile', compact('user'));
        }
        return redirect('/');
        // abort(403);
    }
}
