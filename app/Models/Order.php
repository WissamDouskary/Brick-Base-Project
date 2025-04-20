<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['quantity', 'status', 'product_id', 'price'];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
