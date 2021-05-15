<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
    public function major() {
        return $this->belongsTo(Major::class);
    }
}
