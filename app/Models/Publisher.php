<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'name', 'year', 'city'
    ];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
