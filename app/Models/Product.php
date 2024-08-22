<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id', 'name', 'title', 'cost_price', 'description', 'specification', 'image_path', 'price',  'gallery', 'sale_price', 'discount', 'views', 'order_count', 'sku', 'qty', 'status','public_id'
    ];

    protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', 1);
    }

    public function resources()
    {
        return $this->hasOne(ProductResource::class, 'product_id', 'id');
    }
}
