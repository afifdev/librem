<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'kind_id', 'category_id', 'writer_id', 'publisher_id', 'title', 'description', 'image',
    ];
    use HasFactory;
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function writer() {
        return $this->belongsTo(Writer::class);
    }
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
}
