<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'code', 'kind_id', 'category_id', 'writer_id', 'publisher_id', 'grade_id', 'title', 'description', 'image', 'availability', 'isbn'
    ];
    use HasFactory;
    public function kind() {
        return $this->belongsTo(Kind::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function writer() {
        return $this->belongsTo(Writer::class);
    }
    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
}
