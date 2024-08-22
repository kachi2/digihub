<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'resource',
        'resouce_type',
        'total_download',
        'status',
        'last_downloaded',
        'public_id'
    ];
}
