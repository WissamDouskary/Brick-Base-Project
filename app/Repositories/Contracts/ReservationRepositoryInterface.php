<?php 

namespace App\Repositories\Contracts;

interface ReservationRepositoryInterface {
    public function create(array $data);
    public function modify(int $id, array $data);
    public function cancel(int $id);
    public function getWorkerOffers();
    public function getClientOffers();
    public function manageOffers($offer_id, $status);
    public function filterOffers($status);
    public function filterOffersClient($status);
}