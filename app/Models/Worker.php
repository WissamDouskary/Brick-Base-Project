<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Worker extends User
{
    protected $fillable = ['bio', 'job-title'];

    public static function boot() {
        parent::boot();
        static::creating(function ($worker) {
            $worker->role_id = Role::where('name', 'worker')->first()->id;
        });
    }
}
