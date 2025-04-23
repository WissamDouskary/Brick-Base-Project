<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ReviewsRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    protected $userservice;
    protected $reviewservice;
    protected $productservice;

    public function __construct(UserRepositoryInterface $user_repository, ReviewsRepositoryInterface $reviews_repository, ProductRepositoryInterface $product_repository)
    {
        $this->userservice = $user_repository;
        $this->reviewservice = $reviews_repository;
        $this->productservice = $product_repository;
    }

    public function index(){
        $countUsers = count($this->userservice->filterByActive(1));
        $countinactiveUsers = count($this->userservice->filterByActive(0));
        $countReviews = count($this->reviewservice->getallReviews());
        $countproducts = count($this->productservice->getall());
        $countWorkers = count($this->userservice->filterByRole(1));

        $latestUsers = $this->userservice->getAllUsers()->take(3);

        return view('Pages.dashboard.reports', compact('countUsers', 'countinactiveUsers', 'countReviews', 'countproducts', 'countWorkers', 'latestUsers'));
    }
}
