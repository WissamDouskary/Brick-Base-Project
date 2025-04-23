<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\User;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{

    public function create(array $data)
    {
        return Auth::user()->product()->create($data);
    }

    public function update(array $data, $id)
    {
        $product = Product::find($id);
        return $product->update($data);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        return $product->delete();
    }

    public function findById($id)
    {
        return Product::find($id);
    }

    public function getall($status)
    {
        return Product::where('worker_id', '!=', Auth::id())->where('status', $status)->latest()->with('user')->paginate(9);
    }

    public function get3($id)
    {
        return Product::where('worker_id', '!=', Auth::id())
            ->where('status', 'Accepted')
            ->where('id', '!=', $id)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function getWorkerProducts()
    {
        return Product::where('worker_id', Auth::id())->paginate(3);
    }

    public function manageProduct($id, $status)
    {
        $product = Product::find($id);
        return $product->update([
            'status' => $status,
        ]);
    }
}
