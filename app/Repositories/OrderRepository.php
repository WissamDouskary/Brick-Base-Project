<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\User;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface
{

    public function store(array $data){
        return Auth::user()->order()->create($data);
    }

    public function getClientOrders()
    {
        return Auth::user()->order()->with('product')->paginate(6);
    }

    public function filterClientOrders($status)
    {
        return Auth::user()->order()->where('status', $status)->paginate(6);
    }
}
