<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends User {
    public static function boot() {
        parent::boot();
        static::creating(function ($client) {
            $client->role_id = Role::where('name', 'client')->first()->id;
        });
    }
}
