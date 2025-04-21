<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['client_id', 'reviewable_id', 'reviewable_type', 'rating', 'comment'];

    public function reviewable()
    {
        return $this->morphTo();
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
