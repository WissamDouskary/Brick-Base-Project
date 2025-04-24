<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $productservice;

    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->productservice = $product_repository;
    }

    public function index(){
        $products = $this->productservice->getProductsWithComments();
        return view('Pages.dashboard.comments', compact('products'));
    }
}
