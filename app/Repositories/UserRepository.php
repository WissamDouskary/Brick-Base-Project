<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findById($id)
    {
        return User::where('id', '!=', Auth::id())->where('id', $id)->withCount('reviews')->withAvg('reviews', 'rating')->first();
    }

    public function getWorkers()
    {
        return User::where('role_id', 1)
            ->where('is_active', true)
            ->withCount('reviews')
            ->where('id', '!=', Auth::id())
            ->withCount(['recievedReservations as accepted_reservations_count' => function($query){
                $query->where('status', 'Accepted');
            }])
            ->withAvg('reviews', 'rating')
            ->paginate(9);
    }

    public function get3workers($id)
    {
        return User::where('role_id', '1')
            ->where('id', '!=', Auth::id())
            ->where('id', '!=', $id)
            ->where('is_active', true)
            ->limit(3)
            ->get();
    }

    public function filterByActive($is_active)
    {
        return User::where('is_active', $is_active)
            ->where('id', '!=', Auth::id())
            ->with('role')
            ->paginate(9);
    }

    public function filterByRole($role_id)
    {
        return User::where('role_id', $role_id)
            ->where('id', '!=', Auth::id())
            ->with('role')
            ->paginate(9);
    }

    public function filterByRoleAndStatus($role_id, $is_active)
    {
        return User::where('role_id', $role_id)
            ->where('is_active', $is_active)
            ->where('id', '!=', Auth::id())
            ->with('role')
            ->paginate(9);
    }

    public function getAllUsers()
    {
        return User::where('id', '!=', Auth::id())
        ->latest()
        ->paginate(9);
    }

    public function manageStatus($id, $status)
    {
        $user = User::find($id);
        return $user->update([
            'is_active' => $status
        ]);
    }

    public function filterWorkers($request){
        $query = User::query()->where('is_active', true)->withAvg('reviews', 'rating')->where('role_id', 1)->where('id', '!=', Auth::id());

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'ILIKE', '%' . $request->search . '%')
                    ->orWhere('last_name', 'ILIKE', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if($request->filled('city')){
            $query->where('city', $request->city);
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'popular':
                    $query->orderBy('reviews_avg_rating', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }

        return $query->paginate(9);
    }
}
