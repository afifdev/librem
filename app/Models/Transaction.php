<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function student() {
        return $this->belongsTo(Student::class);
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function book() {
        return $this->belongsTo(Book::class);
    }
}
