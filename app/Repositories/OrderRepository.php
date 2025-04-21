<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\OrderRepositoryInterface;

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

    public function cancelOrder($id){
        $order = Order::find($id);
        return $order->update(['status' => 'Failed']);
    }
}
