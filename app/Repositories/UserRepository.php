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
            ->where('id', '!=', $id)
            ->where('is_active', true)
            ->limit(3)
            ->get();
    }
}
