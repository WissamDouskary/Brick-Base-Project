<?php
namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;


Class ProductService {

    protected $productrepository;

    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->productrepository = $product_repository;
    }

    public function create($data){
        return $this->productrepository->create($data);
    }
}