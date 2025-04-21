<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReviewsService;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    protected $reviewsservice;

    public function __construct(ReviewsService $reviews_service)
    {
        $this->reviewsservice = $reviews_service;
    }

    public function store(Request $request){
        $data = $request->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);

        $data['client_id'] = Auth::id();

        $this->reviewsservice->store($request->product_id, $data);

        return back()->with('success', 'comment posted successfuly');
    } 
}
