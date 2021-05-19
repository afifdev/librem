<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
