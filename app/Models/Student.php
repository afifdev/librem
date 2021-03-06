<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $casts = [
        'nis' => 'string'
    ];
    protected $guard = 'students';
    protected $fillable = [
        'nis', 'password', 'name', 'gender', 'born_date', 'born_place', 'address', 'phone_number', 'start_year', 'grade_id', 'major_id', 'graduated',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
