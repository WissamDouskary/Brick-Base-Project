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
            'comment' => 'required|max:200|min:3'
        ]);

        $data['client_id'] = Auth::id();
        
        if(isset($request->product_id)){
            $this->reviewsservice->store($request->product_id, $data);
        }else{
            $this->reviewsservice->store($request->worker_id, $data);
        }
        

        return back()->with('success', 'comment posted successfuly');
    } 
}
