<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Teacher,Student};
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
        if (auth()->guard('student')->check()) {
            $nis = auth()->guard('student')->user()->nis;
            $user = DB::table('students')->where('students.nis','=',$nis)
                        ->join('transactions','transactions.student_nis','=','students.nis')
                        ->join('details','details.transaction_id','=','transactions.id')
                        ->join('books','books.code','=','transactions.book_code')
                        ->select('students.name as user_name','students.nis as user_number','books.title as title','transactions.status as status','details.take_date as take_date','details.due_date as due_date','details.return_date as return_date','details.penalty as penalty','details.debt_collected as debt_collected')
                        ->get();
            return view('Profile.index', compact('user'));
        } else if (auth()->guard('teacher')->check()) {
            $nip = auth()->guard('teacher')->user()->nip;
            $user = DB::table('teachers')->where('teachers.nip','=',$nip)
                        ->join('transactions','transactions.student_nis','=','teachers.nip')
                        ->join('details','details.transaction_id','=','transactions.id')
                        ->join('books','books.code','=','transactions.book_code')
                        ->select('teachers.name as user_name','teachers.nip as user_number','books.title as title','transactions.status as status','details.take_date as take_date','details.due_date as due_date','details.return_date as return_date','details.penalty as penalty','details.debt_collected as debt_collected')
                        ->get();
            return view('Profile.index', compact('user'));
        }
        abort(403);
    }
}
