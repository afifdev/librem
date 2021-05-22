<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_code', 'student_nis', 'teacher_nip', 'status'
    ];
    public function book() {
        return $this->belongsTo(Book::class, 'book_code', 'code');
    }
    public function student() {
        return $this->belongsTo(Student::class, 'student_nis', 'nis');
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_nip', 'nip');
    }
    public function detail() {
        return $this->hasOne(Detail::class);
    }
    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
