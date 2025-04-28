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
        return Product::where('id', $id)->WithCount('orders')->withAvg('reviews', 'rating')->withCount('reviews')->first();
    }

    public function getall($status)
    {
        return Product::where('worker_id', '!=', Auth::id())->where('status', $status)->latest()->with('user')->WithCount('orders')->withAvg('reviews', 'rating')->paginate(9);
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

    public function getProductsWithComments()
    {
        return Product::withCount('reviews')
            ->where('status', 'Accepted')
            ->WithCount(['orders as completed_orders_count' => function ($query) {
                $query->where('status', 'Completed');
            }])
            ->withAvg('reviews', 'rating')
            ->paginate(3);
    }

    public function filterProducts($request)
    {
        $query = Product::query()->where('status', 'Accepted')->withAvg('reviews', 'rating');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
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
