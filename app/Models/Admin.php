<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends User {
    public static function boot() {
        parent::boot();
        static::creating(function ($admin) {
            $admin->role_id = Role::where('name', 'admin')->first()->id;
        });
    }
}
