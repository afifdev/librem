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

    protected $guard = 'students';
    protected $fillable = [
        'nis', 'password', 'name', 'gender', 'born_date', 'born_place', 'address', 'phone_number', 'start_year', 'grade_id', 'major_id'
    ];
}
