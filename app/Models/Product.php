<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'main_image', 'description', 'price', 'worker_id', 'category', 'in_stock', 'status'];

    public function user(){
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
