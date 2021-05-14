<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'siswas';

    protected $fillable = [
        'nis', 'password', 'name', 'gender', 'born_date', 'born_place', 'address', 'phone', 'start_year', 'grade_id', 'classroom_id', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
