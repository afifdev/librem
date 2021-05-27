<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $casts = [
        'nip' => 'string'
    ];
    protected $guard = 'teachers';
    protected $fillable = [
        'nip', 'password', 'name', 'gender', 'born_date', 'born_place', 'address', 'phone'
    ];
}
