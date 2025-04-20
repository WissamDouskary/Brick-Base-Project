<?php

namespace App\Services;

use App\Repositories\ReservationRepository;

Class ReservationService {
    protected $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function create($data){
        return $this->reservationRepository->create($data);
    }

    public function getWorkerOffers(){
        return $this->reservationRepository->getWorkerOffers();
    }

    public function getClientOffers(){
        return $this->reservationRepository->getClientOffers();
    }

    public function filterOffersClient($status){
        return $this->reservationRepository->filterOffersClient($status);
    }

    public function manageOffers($offer_id, $status){
        return $this->reservationRepository->manageOffers($offer_id, $status);
    }

    public function filterOffers($status){
        return $this->reservationRepository->filterOffers($status);
    }
}