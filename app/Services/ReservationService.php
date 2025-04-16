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
}