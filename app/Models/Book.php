<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function publishers() {
        return $this->belongsToMany(Publisher::class);
    }
    public function writers() {
        return $this->belongsToMany(Writer::class);
    }
}
