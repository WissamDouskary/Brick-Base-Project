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
        return User::where('id', '!=', Auth::id())->find($id);
    }

    public function getWorkers()
    {
        return User::where('role_id', 1)
            ->where('is_active', true)
            ->where('id', '!=', Auth::id())
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
        ->paginate(9);
    }

    public function manageStatus($id, $status)
    {
        $user = User::find($id);
        return $user->update([
            'is_active' => $status
        ]);
    }
}
