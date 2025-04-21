<?php
namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\ReviewsRepositoryInterface;

class ReviewsService {
    protected $reviewsrepository;

    public function __construct(ReviewsRepositoryInterface $reviews_repository)
    {
        $this->reviewsrepository = $reviews_repository;
    }

    public function store($id, $data){
        return $this->reviewsrepository->store($id, $data);
    }
}