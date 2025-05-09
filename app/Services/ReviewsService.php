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

    public function getReviews($id){
        return $this->reviewsrepository->getReviews($id);
    }

    public function getallReviews(){
        return $this->reviewsrepository->getallReviews();
    }

    public function getProductsReviews()
    {
        return $this->reviewsrepository->getProductsReviews();
    }

    public function getWorkersReviews()
    {
        return $this->reviewsrepository->getWorkersReviews();
    }

    public function modify($id, $content){
        return $this->reviewsrepository->modify($id, $content);
    }

    public function destroy($id){
        return $this->reviewsrepository->delete($id);
    }
}