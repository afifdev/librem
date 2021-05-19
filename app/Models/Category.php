<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'kind_id', 'name'
    ];
    public function kind() {
        return $this->belongsTo(Kind::class);
    }
}
