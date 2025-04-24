<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $productservice;
    protected $userservice;

    public function __construct(ProductRepositoryInterface $product_repository, UserRepositoryInterface $user_repository)
    {
        $this->productservice = $product_repository;
        $this->userservice = $user_repository;
    }

    public function index(){
        $products = $this->productservice->getProductsWithComments();
        $workers = $this->userservice->getWorkers();

        return view('Pages.dashboard.comments', compact('products', 'workers'));
    }
}
