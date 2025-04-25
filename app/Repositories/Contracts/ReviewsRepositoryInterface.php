<?php 

namespace App\Repositories\Contracts;

interface ReviewsRepositoryInterface {
    public function store($id, $data);
    public function modify($id, $content);
    public function delete($id);
    public function getReviews($id);
    public function getallReviews();
    public function getProductsReviews();
    public function getWorkersReviews();
}