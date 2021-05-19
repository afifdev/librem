<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id','type','take_date','due_date','return_date','penalty','debt_collected','detail'
    ];
    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
}
