<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ReviewsRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $productservice;
    protected $userservice;
    protected $reviewsservice;

    public function __construct(ProductRepositoryInterface $product_repository, UserRepositoryInterface $user_repository, ReviewsRepositoryInterface $reviews_repository)
    {
        $this->productservice = $product_repository;
        $this->userservice = $user_repository;
        $this->reviewsservice = $reviews_repository;
    }

    public function index()
    {
        $products = $this->productservice->getProductsWithComments();
        $workers = $this->userservice->getWorkers();
        $productComments = $this->reviewsservice->getProductsReviews();
        $workerComments = $this->reviewsservice->getWorkersReviews();

        return view('Pages.dashboard.comments', compact('products', 'workers', 'productComments', 'workerComments'));
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return back()->with('success', 'comment deleted succesfuly');
    }
}
