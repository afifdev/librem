<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Transaction, Book, Teacher, Student, Detail, Admin};
use App\Http\Requests\{StoreTransactionRequest, UpdateTransactionRequest};

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('auth.admin.transaction.index', compact('transactions'));
    }

    public function search()
    {
        $id = request()->search;
        $transactions = Transaction::where('id','like','%'.$id.'%')->get();
        return view('auth.admin.transaction.index', compact('transactions'));
    }
    public function register()
    {
        return view('auth.admin.transaction.register');
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            abort(404);
        }
        return view('auth.admin.transaction.show', compact('transaction'));
    }

    public function create(StoreTransactionRequest $request)
    {
        $admin = auth()->guard('admin')->user()->id;
        $form = $request;
        $book = Book::where('code', $form->book_code)->get();
        $user;
        if ($form->user === 'student') {
            $user = Student::where('nis', $form->user_number)->get();
        } else if ($form->user === 'teacher') {
            $user = Teacher::where('nip', $form->user_number)->get();
        }
        if (count($book) === 0) {
            session()->flash('error', 'Book not found');
            return redirect()->back();
        }
        if (count($user) === 0) {
            session()->flash('error', 'Student not found');
            return redirect()->back();
        }
        $transaction = new Transaction;
        $transaction->book_code = $form->book_code;
        if ($form->user === 'student') {
            $transaction->user_type = 'student';
            $transaction->student_nis = $form->user_number;
        } else if ($form->user === 'teacher') {
            $transaction->user_type = 'teacher';
            $transaction->teacher_nip = $form->user_number;
        }
        $transaction->status = 'borrowed';
        $transaction->admin_id = $admin;
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

    public function update(UpdateTransactionRequest $request, $id)
    {
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

    public function delete($id)
    {
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
