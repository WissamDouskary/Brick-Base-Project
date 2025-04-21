<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Order;
use App\Models\Product;
use App\Models\WorkerImage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'profile_photo',
        'email',
        'password',
        'is_active',
        'city',
        'role_id',
        'job_title',
        'bio',
        'category',
        'price'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function images()
    {
        return $this->hasMany(WorkerImage::class, 'worker_id');
    }

    public function product(){
        return $this->hasMany(Product::class, 'worker_id');
    }

    public function recievedReservations(){
        return $this->hasMany(Reservation::class, 'worker_id');
    }

    public function madeReservations(){
        return $this->hasMany(Reservation::class, 'client_id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'client_id');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
