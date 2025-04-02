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

    public function getall()
    {
        return Product::all();
    }
}