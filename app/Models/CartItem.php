<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id', 'product_id', 'Order_no', 'qty', 'payable', 'status','cartSession', 'product_name', 'image', 'price', 'product_prescription'
    ];

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productResource() 
    {
        return $this->hasOneThrough(ProductResource::class, Product::class, 'id', 'product_id', 'product_id','id');
    }
}
