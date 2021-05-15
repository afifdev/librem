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


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
