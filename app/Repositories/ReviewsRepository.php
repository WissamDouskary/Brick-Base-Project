<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\ReviewsRepositoryInterface;

class ReviewsRepository implements ReviewsRepositoryInterface {
    public function store($id, $data){
        if(Product::find($id)){

            $product = Product::find($id);
            return $product->reviews()->create($data);

        } else if(User::find($id)) {

            $worker = User::find($id);
            return $worker->reviews()->create($data);

        }
    }

    public function modify($id, $content){

    }

    public function delete($id){

    }

    public function getReviews($id){
        if(Product::find($id)){

            $product = Product::find($id);
            return $product->reviews;

        } else if(User::find($id)) {

            $worker = User::find($id);
            return $worker->reviews;

        }
    }

    public function getallReviews(){
        return Review::all();
    }

    public function getProductsReviews()
    {
        return Product::has('reviews')->with(['reviews.client', 'user'])->with('reviews')->with('user')->with(['reviews.client'])->paginate(7);
    }

    public function getWorkersReviews()
    {
        return User::has('reviews')->with('reviews')->with(['reviews.client'])->paginate(7);
    }
}