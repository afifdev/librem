<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Transaction,Book,Teacher,Student,Detail};
use App\Http\Requests\{StoreTransactionRequest, UpdateTransactionRequest};

class TransactionController extends Controller
{
    public function index() {
        $transactions = DB::table('transactions')
                            ->join('books','transactions.book_code','=','books.code')
                            ->join('students','transactions.student_nis','=','students.nis')
                            ->join('teachers','transactions.teacher_nip','=','teachers.nip')
                            ->select('transactions.*','books.title','students.name as student_name','teachers.name as teacher_name')
                            ->get();
        return view('Admin.Transaction.index', compact('transactions'));
    }
                        
    public function search() {
        $form = request();
        $query = array();
        if ($form->search && in_array($form->search_by, array('transaction_code','book_title','user','librarian'))) {
            if ($form->search_by === 'transaction_code') {
                $form->search_by = 'transactions.id';
            }
            if ($form->search_by === 'book_title') {
                $form->search_by = 'books.title';
            }
            if ($form->search_by === 'user') {
                $form->search_by = 'students.name';
            }
            if ($form->search_by === 'librarian') {
                $form->search_by = 'teachers.name';
            }
            array_push($query, array($form->search_by,'LIKE','%'.$form->search.'%'));
        }
        if ($form->status !== 'all' && in_array($form->status, array('borrowed','debt','done'))) {
            array_push($query, array('status','LIKE','%'.$form->status.'%'));
        }
        $transactions = DB::table('transactions')
                            ->join('books','transactions.book_code','=','books.code')
                            ->join('students','transactions.student_nis','=','students.nis')
                            ->join('teachers','transactions.teacher_nip','=','teachers.nip')
                            ->select('transactions.*','books.title','students.name as student_name','teachers.name as teacher_name')
                            ->where($query)
                            ->get();
        return view('Admin.Transaction.index', compact('transactions'));
    }
    public function register() {
        return view('Admin.Transaction.register');
    }

    public function show($id) {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            abort(404);
        }
        return view('Admin.Transaction.show', compact('transaction'));
    }

    public function create(StoreTransactionRequest $request) {
        $form = $request;
        $book = Book::where('code', $form->book_code)->get();
        $student = Student::where('nis', $form->student_nis)->get();
        $teacher = Teacher::where('nip', $form->teacher_nip)->get();
        if (count($book) === 0) {
            session()->flash('error', 'Book not found');
            return redirect()->back();
        }
        if (count($student) === 0) {
            session()->flash('error', 'Student not found');
            return redirect()->back();
        }
        if (count($teacher) === 0) {
            session()->flash('error', 'Teacher not found');
            return redirect()->back();
        }
        $transaction = new Transaction;
        $transaction->book_code = $form->book_code;
        $transaction->student_nis = $form->student_nis;
        $transaction->teacher_nip = $form->teacher_nip;
        $transaction->status = 'borrowed';
        $transaction->save();

        $detail = new Detail;
        $detail->transaction_id = $transaction->id;
        $detail->type = $form->type;
        $detail->take_date = date("Y-m-d");
        $detail->due_date = $form->due_date;
        $detail->detail = $form->detail;
        $detail->save();

        $book[0]->availability = 0;
        $book[0]->save();

        return redirect()->route('transaction');
    }

    public function update(UpdateTransactionRequest $request, $id) {
        $transaction = Transaction::find($id);
        $detail = $transaction->detail;
        if ($request->return_date && !$detail->return_date) {
            $due_date = date_create($detail->due_date);
            $return_date = date_create($request->return_date);
            $gap = intval(date_diff($due_date, $return_date)->format("%R%a"));
            if ($gap > 0) {
                $detail->penalty = $gap * 200;
                $detail->debt_collected = 0;
                $transaction->status = 'debt';
            } else {
                $transaction->status = 'done';
            }
            $book = $transaction->book;
            $book->availability = 1;
            $book->save();
            $transaction->save();
            $detail->return_date = $request->return_date;
            $detail->save();
        } else if ($request->debt_collected && $detail->return_date && $detail->penalty !== $detail->debt_collected) {
            if ($request->debt_collected <= $detail->debt_collected || $request->debt_collected > $detail->penalty) {
                return back();
            }
            $detail->debt_collected = $request->debt_collected;
            if ($request->debt_collected === $detail->penalty) {
                $transaction->status = 'done';
                $transaction->save();
            }
            $detail->save();
        }
        return redirect()->route('transaction');
    }

    public function delete($id) {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            abort(404);
        }
        $detail = $transaction->detail;
        if ($detail->penalty !== $detail->debt_collected) {
            return back();
        }
        $book = $transaction->book;
        $book->availability = 1;
        $book->save();
        $detail = $transaction->detail;
        $detail->delete();
        $transaction->delete();

        return redirect()->route('transaction');
    }

}