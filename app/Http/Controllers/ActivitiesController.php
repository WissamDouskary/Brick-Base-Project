<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ActivitiesController extends Controller
{
    protected $productservice;

    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->productservice = $product_repository;
    }

    public function index(Request $request){
        $amount = $request->get('amount', 3);
        $amountAccepted = $request->get('amountaccepted', 3);

        // count for stats
        $countacceptedProducts = count($this->productservice->getall('Accepted'));
        $countdeclinedProducts = count($this->productservice->getall('Declined'));
        $countpendingProducts = count($this->productservice->getall('Pending'));
        $countallProducts = $countacceptedProducts + $countdeclinedProducts + $countpendingProducts;

        // methods for show
        $pendingProducts = $this->productservice->getall('Pending')->take($amount);
        $acceptedProducts = $this->productservice->getall('Accepted')->take($amountAccepted);

        return view('Pages.dashboard.activities', compact('countacceptedProducts', 'countpendingProducts', 'countdeclinedProducts', 'countallProducts', 'pendingProducts', 'amount', 'amountAccepted', 'acceptedProducts'));
    }
}
