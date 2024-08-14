<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating', 'message', 'user_id', 'product_id', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
