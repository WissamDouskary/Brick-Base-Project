<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['start_date', 'end_date', 'status', 'price', 'client_id', 'worker_id'];

    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }

    public function worker(){
        return $this->belongsTo(User::class, 'worker_id');
    }
}
